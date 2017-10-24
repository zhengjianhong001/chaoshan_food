<?php 
$title="食潮天下|菜谱";
include('../views/layouts/navigation_bar.html');
include('../views/layouts/cookbook_bar.html');
?> 
<div style="width: 100%;margin-top: -150px;">
  <div class="main_banner">
      <div class="main_banner_wrap">
        <div class="main_banner_box" id="m_box">
          <a href="javascript:void(0)" class="banner_btn js_pre">
            <span class="banner_btn_arrow"><i></i></span>
          </a>
          <a href="javascript:void(0)" class="banner_btn btn_next js_next">
            <span class="banner_btn_arrow"><i></i></span>
          </a>
          <ul>
            <li id="imgCard0">
              <a target="_blank" href="https://world.taobao.com/item/546213629840.htm?fromSite=main&spm=a230r.1.14.21.ebb2eb2olTiLr&ns=1&abbucket=3#detail"><span style="opacity:0;"></span></a>      
              <img src="../assets/img/6.jpg" alt="">
              <p style="bottom:0">故乡的味道</p>
            </li> 
            <li id="imgCard1">
              <a target="_blank" href="https://world.taobao.com/item/546213629840.htm?fromSite=main&spm=a230r.1.14.21.ebb2eb2olTiLr&ns=1&abbucket=3#detail"><span style="opacity:0.4;"></span></a>      
              <img src="../assets/img/7.jpg" alt="">
              <p>备战中秋</p>
            </li> 
            <li id="imgCard2">
              <a target="_blank" href="https://world.taobao.com/item/553177784552.htm?fromSite=main&spm=a230r.1.14.25.ebb2eb29yzCQP&ns=1&abbucket=3#detail"><span style="opacity:0.4;" ></span></a>        
              <img src="../assets/img/8.jpg" alt="">
              <p>野生即食海鲜，Q弹口感</p>
            </li> 
            <li id="imgCard3">
              <a target="_blank" href="https://shop104579023.world.taobao.com/?spm=a312a.7728556.2015080705.4.8888752MjCt4U"><span style="opacity:0.4;"></span></a>      
              <img src="../assets/img/9.jpg" alt="">
              <p>海味大促销</p>
            </li> 
            <li id="imgCard4">
              <a target="_blank" href="https://world.taobao.com/item/556097202522.htm?fromSite=main&ali_refid=a3_430673_1006:1110537370:N:%E8%93%9D%E8%8E%93%E9%85%B1%E6%9E%9C%E9%85%B1%E5%8C%85%E9%82%AE:9a3ef2ba90abe8da5cec10f74363e375&ali_trackid=1_9a3ef2ba90abe8da5cec10f74363e375&spm=a2e15.8261149.07626516002.5.53eedc80fN1kUA"><span style="opacity:0.4;"></span></a>      
              <img src="../assets/img/10.jpg" alt="">
              <p>意大利草莓酱</p>
            </li> 
          </ul>
          <!--火狐倒影图层-->
          <p id="rflt"></p>
          <!--火狐倒影图层-->
        </div>
        <!--序列号按钮-->
        <div class="btn_list">
          <span class="curr"></span><span></span><span></span><span></span><span></span>        
        </div>
      </div>
    </div>  
</div>
<div style="width: 75.1%;height: 500px;margin-left: 160px;margin-top:50px;">
 
 <!--新秀菜谱-->
    <div class="w1" id="tab" style="clear: both;">
      <div class="tablist">
        <h3 class="select">新秀菜谱</h3>
        <h3>一周热门</h3>
        <h3>最受欢迎的家常菜</h3>
      </div>
      <div class="tabcontent">
      <!--新秀菜谱-->
       <ul class="active">
          <li style="margin-left: -110px;">
          <?php $res=index_new_upfood_one($dbc);  foreach($res as $row){?>
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
              <span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
            </a>

            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); }?></a>  
          </li>
          <?php $res=index_new_upfood_all($dbc);  foreach($res as $row){?>
          <li>
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
              <span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
              
            </a>
            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); ?></a>
          </li>
          <?php } ?>
          
        </ul>
        <!--一周热门-->
       <ul>
          <li style="margin-left: -210px;">
          <?php $res=week_popular_food_one($dbc);
                  foreach ($res as $row) {?>
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['food_id']; ?>">
            
              <span><img src="<?php $food_res=sel_food($dbc,$row['food_id']);foreach ($food_res as $food_row) {
                echo fing_cookbook_img($dbc,$food_row['id']);
               ?>"></span>
            </a>
            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $food_row['publish_id']; ?>"><?php echo getUserName($dbc,$food_row['publish_id']); }}?></a>
          
          </li>
          <?php $res=week_popular_food_other($dbc);
                  foreach ($res as $row) {?>
          <li>      
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['food_id']; ?>">
            
              <span><img src="<?php $food_res=sel_food($dbc,$row['food_id']);foreach ($food_res as $food_row) {
                echo fing_cookbook_img($dbc,$food_row['id']);
               ?>"></span>
            </a>
            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $food_row['publish_id']; ?>"><?php echo getUserName($dbc,$food_row['publish_id']); }?></a>
          
          </li>
          <?php } ?>
        </ul>
        <!--最受欢迎的家常菜-->
       <ul>
          <li style="margin-left: -390px;">
          <?php $res=home_popuular_food_one($dbc); foreach ($res as  $row) {?>
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
              <span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
            </a>
            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); }?></a>
          </li>
          <li style="margin-left: -137px;">
            <?php $res=home_popuular_food_two($dbc); foreach ($res as  $row) {?>
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
              <span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
            </a>
            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); }?></a>
          </li>
          <?php $res=home_popuular_food_other($dbc); foreach ($res as  $row) {?>
          <li>
            <a target="_blank" href="CookBook_recipe.php?food_id=<?php echo $row['id']; ?>">
              <span><img src="<?php echo fing_cookbook_img($dbc,$row['id']); ?>"></span>
            </a>
            <a target="_blank" class="user" href="personal_index.php?user_id=<?php echo $row['publish_id']; ?>"><?php echo getUserName($dbc,$row['publish_id']); ?></a>
          </li>
        <?php } ?>  
        </ul>
      </div>
    </div>
        
      </div>
    </div>

</div>
<?php 
include('../views/layouts/footer.html');
?> 
  <script>window.jQuery || document.write('<script src="../assets/js/jquery-1.10.2.min.js"><\/script>')</script>
  <script>
  window.onload = function () {
    tab();
}
    $(function(){
  var len=$(".main_banner li").length;
  var index_2=0;
  var timer=800;
  var intervaltimer=0;
  var isMoving=false;
  
  function slide(slideMode){//轮播方法    
    if (isMoving==false){
      isMoving=true;
      var prev; var next; var hidden;
      var curr=$("#imgCard"+index_2);//当前正中显示
      
      if(index_2==0){               //当前正中显示的是第0张时 prev为最后一张
        prev=$("#imgCard"+(len-1));         
      }else{                        //否则  序列号-1
        prev=$("#imgCard"+(index_2-1));     
      }
      if(index_2==(len-1)){         //当前正中显示的是最后一张时 next为第0张
        next=$("#imgCard0");
      }else{                      //否则  序列号+1
        next=$("#imgCard"+(index_2+1));
      }
  
      if(slideMode){      //slideMode为1(true)，执行slide(1)，上一张
        if(index_2-2>=0){                 //index_2           2   3   4
          hidden=$("#imgCard"+(index_2-2));//                 0   1   2
        }else{                          //index_2   0   1
          hidden=$("#imgCard"+(len+index_2-2));//     3   4
        }
        prev.css("z-index","5");      //点击prev按钮  让prev位置上的这张图片 层级最高 显示
        next.css("z-index","1");
        curr.css("z-index","2");      
        hidden.css("z-index","1");
        //当index_2自减，各图片往右运动效果
        hidden.css({width:"450px",height:"180px",top:"60px","left":"0px","opacity":0});
        hidden.stop(true,true).animate({width:"580px",height:"240px",top:"20px",left:"0px",opacity:1},timer);
        curr.stop(true,true).animate({width:"580px",height:"240px",top:"20px",left:"600px",opacity:1},timer);
        next.stop(true,true).animate({width:"450px",height:"180px",top:"60px","left":"730px","opacity":0},timer,function(){next.find("span").css("opacity",0); isMoving = false;});
        //prev  -->  curr     prev中的图片li轮换到curr的位置      其他一次轮换
        prev.find("span").css("opacity",0);
        $(".main_banner_box li").find("p").css({"bottom":"-50px"});//所有标题隐藏
        prev.stop(true,true).animate({width:"670px",height:"280px",left:"255px",top:0,opacity:1},timer,function(){
          $(this).find("p").animate({"bottom":"0px"});  //当前这张图片的标题运动出来
        });
        index_2--;
      }else{      //执行next 操作
        if(index_2+2>=len){               //index_2               3   4 
          hidden=$("#imgCard"+(index_2+2-len));//                   0   1
        }else{                          //index_2   0   1   2
          hidden=$("#imgCard"+(index_2+2));//           2   3   4
        }
        prev.css("z-index","1");
        next.css("z-index","5");      //点击next按钮  让next位置上的这张图片 层级最高 显示
        curr.css("z-index","2");
        hidden.css("z-index","1");
        //当index_2自增，各图片往左运动效果
        hidden.css({width:"450px",height:"180px",top:"60px","left":"730px","opacity":0});
        hidden.stop(true,true).animate({width:"580px",height:"240px",top:"20px",left:"600px",opacity:1},timer);             
        curr.stop(true,true).animate({width:"580px",height:"240px",top:"20px",left:"0px",opacity:1},timer);
        //next  -->  curr     next中的图片li轮换到curr的位置      其他一次轮换
        next.find("span").css("opacity",0);
        $(".main_banner_box li").find("p").css({"bottom":"-50px"});//所有标题隐藏
        next.stop(true,true).animate({width:"670px",height:"280px",left:"255px",top:0,opacity:1},timer,function(){
          $(this).find("p").animate({"bottom":"0px"});  //当前这张图片的标题运动出来
        });
        prev.stop(true,true).animate({width:"450px",height:"180px",left:"0px",top:"60px",opacity:0},timer,function(){
          isMoving = false;
        }); 
        index_2++;  
      }//if else
  
      hidden.find("span").css("opacity",0.5);
      curr.find("span").css("opacity",0.5);
  
      if(index_2==len) index_2=0;
      if(index_2<0) index_2=len+index_2;      //限制index_2的范围
      $(".btn_list span").removeClass('curr').eq(index_2).addClass('curr');//给序列号按钮添加、移除样式
    }
  }//slide()


  if(len>3){
    //序列号按钮 跳序切换 方法
    $(".btn_list span").click(function(event){
      
      if (isMoving ) return;
      var oIndex=$(this).index();
  
      if(oIndex==index_2) return;//点击按钮的序列号与当前图片的序列号一致，return
      clearInterval(intervaltimer)
      intervaltimer=null;
  
      var flag=false;
      //当前显示图片的序列号  和  被点击按钮的序列号  间隔超过1且不是首尾两个的时候
      if(Math.abs(index_2-oIndex)>1&&Math.abs(len-Math.abs(index_2-oIndex))!=1){
        //统一样式
        $(".main_banner_box li").css({width:"300px",height:"120px",left:"600px",top:"60px",opacity:0});
        //如果当前的序列号   比    被点击按钮序列号     大     而且     不相邻、不是首尾  
        if(index_2>oIndex&&len-Math.abs(index_2-oIndex)!=1){
          flag=true;
          index_2=oIndex+1;   //oIndex+1    通过slide()  运动回上一张    oIndex
        }else{//比   小     而且     不相邻、不是首尾
          index_2=oIndex-1;   //oIndex-1     通过slide()  运动到下一张    oIndex
          if(index_2<0) index_2=len-1;
        }
      }else{//当前 比 被点击  大 且   相邻                  //从0    跳到     4    要执行上一张方法
        if((index_2>oIndex&&len-(index_2-oIndex)!=1)||(index_2<oIndex&&len+(index_2-oIndex)==1)){
          flag=true;      //执行上一张
        }
      }
      slide(flag);
      intervaltimer=setInterval(slide,3000);//自动轮播
      
    });
  
    $(".main_banner_box li").on("mousemove",function(){
      if($(this).css("width")=="670px"){//鼠标移入为当前正中显示的图片li，则清除定时器
        clearInterval(intervaltimer);
        intervaltimer=null;
      }
    }).on("mouseout",function(){//鼠标移除重新滚动
        clearInterval(intervaltimer);
        intervaltimer=null;
        intervaltimer=setInterval(slide,3000);
    });
    
    $(".js_pre").click(function(event){//上一张
      if (isMoving ) return;
      clearInterval(intervaltimer);
      intervaltimer=null;
      slide(1);
      intervaltimer=setInterval(slide,3000);
    });
  
    $(".js_next").click(function(event){//下一张
      if (isMoving ) return;
      clearInterval(intervaltimer);
      intervaltimer=null;
      slide();
      intervaltimer=setInterval(slide,3000);        
    });
    
    intervaltimer=setInterval(slide,3000);
    
  }else{
    
    $(".js_pre").hide();
    $(".js_next").hide();
    
  }//if else

});

  </script>
