<?php
namespace app\admin\controller;
class System extends Base {
    
    public function config(){
        
    	$config = config()['webinfo'];
    	$this->assign('webinfo',$config);
    	
        return $this->fetch();
    }
    
    public function upload_file(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        if (empty($file)){
            $file = request()->file('Filedata');
        }
        if (empty($file)) return [];
        $upload_dir = './uploads';
        
        // 移动到框架应用根目录/public/uploads/ 目录下
        $ext = ['ext'=>'jpg,png,gif,jpeg'];
        if (is_array($file)){
            $files = [];
            foreach ($file as $obj){
                $info = $obj->validate($ext)->move($upload_dir);
                if ($info){
                    $files[] = [
                        'ext' => $info->getExtension(),
                        'path' => str_replace('\\', '/', trim($upload_dir,'.') .'/'.$info->getSaveName()),
                        'oldfilename' => $obj->getInfo('name'),
                        'filename' => $info->getFilename()
                    ];
                }else{
                    $this->error($obj->getError());
                }
            }
            return $files;
        }else{
            $info = $file->validate($ext)->move($upload_dir);
            if($info){
                return [
                    'ext' => $info->getExtension(),
                    'path' => str_replace('\\', '/', trim($upload_dir,'.') .'/'.$info->getSaveName()),
                    'oldfilename' => $file->getInfo('name'),
                    'filename' => $info->getFilename()
                ];
            }else{
                // 上传失败获取错误信息
                $this->error($file->getError());
            }
        }
    }
    
    public function update(){
        if ($this->request->isAjax()){
            $config = [
               'bg_pic' => $this->request->post('bg_pic'),
               'appid' => $this->request->post('appid'),
               'appSecret' => $this->request->post('appSecret'),
               'SignName' => $this->request->post('SignName'),
               'AccessKeyId' => $this->request->post('AccessKeyId'),
               'AccessKeySecret' => $this->request->post('AccessKeySecret'),
               'kf_name' => $this->request->post('kf_name'),
               'kf_tel' => $this->request->post('kf_tel'),
               'zx_tel' => $this->request->post('zx_tel'),
               'share_title' => $this->request->post('share_title'),
               'share_desc' => $this->request->post('share_desc'),
               'notice' => $this->request->post('notice'),
            ];
            $filename = '../config/webinfo.php';
            if (!is_writable($filename)){
                $this->error("没权限写入");
            }
            $flag = file_put_contents('../config/webinfo.php', "<?php\r\n// 这个不要删除\r\nreturn ".var_export($config,true).";\r\n?>");
            if ($flag){
                $this->success("保存成功");
            }else{
                $this->error("保存失败");
            }
        }
    }
    
}