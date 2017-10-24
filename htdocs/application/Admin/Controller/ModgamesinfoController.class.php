<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;
header("content-type:text/html;charset=utf-8");
class ModgamesinfoController extends Controller{
    public function index(){
        $newstype=M('gamestype')->select();
        $this->assign('newstype',$newstype);
        //var_dump(ROOT);
        $this->display();
    }
    public function getnames(){
        $typeId=$_POST['typeId'];
        //$typeId=I('post.typeId');
        $gamesname=M('gamesdetails')->where("tid={$typeId}")->select();
        echo "<option value='0'>请选择游戏</option>";
        if($gamesname){
            foreach($gamesname as $c){
                echo "<option value=".$c['id'].">".$c['gamesname']."</option>";
            }
        }
    }
    public function getdetails(){
        $gameId=$_POST['gameId'];
        //$typeId=I('post.typeId');
        $gamesname=M('gamesdetails')->where("id={$gameId}")->find();
        if($gamesname){
             echo "<tr class='inw'><td class='wid'>游戏名称:</td><td class='gamesnameinput'>".$gamesname['gamesname']."</td><td class='wid'>游戏类型:</td><td class='gametypeinput'>".$gamesname['gametype']."</td></tr>";
             echo "<tr class='inw'><td class='wid'>游戏原名:</td><td class='ynameinput'>".$gamesname['yname']."</td><td class='wid'>游戏平台:</td><td class='platforminput'>".$gamesname['platform']."</td></tr>";
             echo "<tr class='inw'><td class='wid'>游戏别名:</td><td class='onameinput'>".$gamesname['oname']."</td><td class='wid'>开发商:</td><td class='developersinput'>".$gamesname['developers']."</td></tr>";
             echo "<tr class='inw'><td class='wid'>发行商:</td><td class='publisherinput'>".$gamesname['publisher']."</td><td class='wid'>发行日期:</td><td class='issuedateinput'>".$gamesname['issuedate']."</td></tr>";
             echo "<tr class='inw'><td class='wid'>游戏画面:</td><td class='gamescreeninput'>".$gamesname['gamescreen']."</td><td class='wid'>玩家人数:</td><td class='playernuminput'>".$gamesname['playernum']."</td></tr>";
             echo "<tr class='inw'><td class='wid'>游戏热度:</td><td class='gamehotinput'>".$gamesname['gamehot']."</td><td class='wid'>小图标:</td><td class='smalldesktopinput'><img src='".ROOT."/admin/images/gamedesktop/".$gamesname['smalldesktop']."' style='width:65px'/></td></tr>";
             echo "<tr class='inw' style='height:60px'><td class='wid'>大图标:</td><td class='bigdesktopinput' colspan='3'><img src='".ROOT."/admin/images/gamedesktop/".$gamesname['bigdesktop']."' style='width:180px'/></td>";
        }
    }
    public function modgamesinfo(){
        $gameId=$_GET['gameid'];
        //var_dump($_POST);
        $a=$_FILES['bigdesktop']['name'];
        $b=$_FILES['smalldesktop']['name'];
        //var_dump($a);
        //var_dump($b);
        if($a!='' && $b!=''){
            $re=M('gamesdetails')->where("id={$gameId}")->save($_POST);
            //var_dump($re);
                $upload = new Upload();
                //设置最大上传的大小
                $upload->maxSize = 10000000;
                //设置允许上传的扩展名
                $upload->exts = array("jpg","gif","png");
                //是否创建子目录
                $upload->autoSub = false;
                //设置保存路径的根目录
                $upload->rootPath = "./";
                //保存路径
                $upload->savePath = "public/admin/images/gamedesktop/";
                //上传文件
                $upload->saveName=array('uniqid',array(mt_rand(1000,9999),true));
                $result1 = $upload->upload();
                $newarr=array();    
                foreach($result1 as $v){
                    $newarr[]=$v['savename'];
                }
                $img_result=M('gamesdetails')->where("id={$gameId}")->save(array("bigdesktop"=>$newarr[1],"smalldesktop"=>$newarr[0]));
                //var_dump($img_result);
                if($img_result){
                    $this->success('修改游戏信息成功',__APP__.'/Modgamesinfo/index',null);
                }else{
                    $this->error('修改游戏信息失败',__APP__.'/Modgamesinfo/index',null);
                     } 
                
        }else{
            unset($_POST['bigdesktop']);
            unset($_POST['smalldesktop']);
            $re=M('gamesdetails')->where("id={$gameId}")->save($_POST);
            if($re){
                $this->success('修改游戏信息成功',__APP__.'/Modgamesinfo/index',null);
            }else{
                $this->error('修改游戏信息失败',__APP__.'/Modgamesinfo/index',null);
            } 
        }
    }
    public function delgamesinfo(){
        $delId=$_GET['delId'];
        $result=M('gamesdetails')->where("id={$delId}")->delete();
        if($result){
            $this->success('删除该游戏信息成功',__APP__.'/Modgamesinfo/index',null);
        }else{
            $this->error('删除该游戏信息失败',__APP__.'/Modgamesinfo/index',null);
        }
        
    }
}
