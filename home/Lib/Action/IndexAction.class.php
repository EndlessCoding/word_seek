<?php
// +----------------------------------------------------------------------
// | ThinkPHP的默认控制器
// +----------------------------------------------------------------------
// | Copyright (c) 2012 http://icat.scuec.edu.cn:8000/cl All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: ChenLong <1025194094@qq.com>
// +----------------------------------------------------------------------


class IndexAction extends Action
{
    /**
    +----------------------------------------------------------
    * 默认操作，用于显示系统首页
    +----------------------------------------------------------
    */
    public function index()
    {
        $this->display();
    }

    /**
    +--------------------------------------------------------------
    * 搜索操作，当用户提交表单后，调用此函数进行搜索，最后返回结果
    +--------------------------------------------------------------
    */
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

    /**
    +----------------------------------------------------------
    * 为用户的搜索提供建议的函数
    +----------------------------------------------------------
    */
    public function suggestion($kw)
    {
        $kw = trim($kw);

        $in = new Model('word_index');
        $result = $in->table('word_index ind,word wo')->where('letter=\'' . $kw . '\' and ind.id=wo.id')->field('wo.word,wo.sound,wo.chinese,wo.lenth')->order('lenth ASC')->limit('0'.','.'20')->select();

        return $result;
    }


    public function checkword()
    {

        $result = $this->suggestion($_POST['keyword']);

        $r = '';
        if(!empty($result)){
            foreach($result as $v)
            {
                $r .= $v['word'] . ' ' . $v['sound'] . ' ' . $v['chinese'] . '<br />';
            }

        }else
        {
            $r = "查无此词";
        }

        $this->ajaxReturn($r,'单词提示：');
    }

}
?>
