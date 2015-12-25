<?php
// 生成百度地图控制器
class SitemaphaoAction extends CommonAction {
		 public function index() {
			$www='http://www.ds131.com';
            $list = M('article')->field('id,time')->order('id desc')->limit(10000)->select();
			$column = M('columns')->field('id,ename')->order('id desc')->limit(100)->select();
			$time='1423562271';
            $sitemap = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
			$sitemap .="<url>\r\n"."<loc>".$www."</loc>\r\n"."<priority>0.8</priority>\r\n<lastmod>".date('Y-m-d',$time)."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";
			foreach($column as $kt=>$t){
			$sitemap .= "<url>\r\n"."<loc>".$www.U('/list/'.$t['ename'])."</loc>\r\n"."<priority>0.6</priority>\r\n<lastmod>".date('Y-m-d',$time)."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";
			}
            foreach($list as $k=>$v){
           $sitemap .= "<url>\r\n"."<loc>".$www.U('/post/'.$v['id'].'.html')."</loc>\r\n"."<priority>0.6</priority>\r\n<lastmod>".date('Y-m-d',$v['time'])."</lastmod>\r\n<changefreq>daily</changefreq>\r\n</url>\r\n";
            }
            $sitemap .= '</urlset>';
            $file = fopen("sitemap.xml","w");
            fwrite($file,$sitemap);
            fclose($file);
            $this->success('地图生成成功');
    }
}
