<?php
class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作
    +----------------------------------------------------------
    */
    public function index()
    {
        $this->display();
    }

    public function a()
    {
      // echo $_GET[];
    }
    public function seek()
    {
        $kw = htmlspecialchars(trim($_GET['keyword']));

        if(empty($kw))
        {
            $this->display("Index:index");
            exit;
        }
        $in = new Model('word');
        $result = $in->where('word=\'' . $kw . '\'')->select();

       // echo $in->getLastSql();
       //dump($result);

        $this->assign("kw",$kw);
        if(!empty($result)){
            $this->assign("result",$result);
            $this->display("Index:seek_result");
        }else
        {
            $this->assign("result","抱歉，搜索单词“<font color=\"red\">" . $kw . "</font>”结果不存在！");
            $this->display("Index:no_result");
        }
    }

    public function suggestion($kw)
    {
        $kw = trim($kw);

        $in = new Model('word_index');
        $result = $in->table('word_index ind,word wo')->where('letter=\'' . $kw . '\' and ind.id=wo.id')->field('wo.word,wo.sound,wo.chinese,wo.lenth')->order('lenth ASC')->limit('0'.','.'20')->select();

       // echo $in->getLastSql();
       // dump($result);

        return $result;
    }


    public function checkword(){

        $kw = htmlspecialchars(trim($_POST['keyword']));
        $result = $this->suggestion($kw);

        $r = '';
        if(!empty($result)){
            foreach($result as $v)
            {
                $r .= $v['word'] . ' ' . $v['sound'] . ' ' . $v['chinese'] . '<br />';
                //$r = $v['word'];
                //break;
            }

        }else
        {
            $r = "查无此词";
        }

        $this->ajaxReturn($r,'单词提示：');
    }



}
?>
