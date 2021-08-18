<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<style type="text/css">
.counter{
  text-align: center;
  font-size: 100px;
}
</style>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>

<script src="js/TweenMax.min.js"></script>
<script src="js/jquery.min.js"></script>


<script>

function count(item){
  var counter = { var: 0 };
  TweenMax.to(counter, 3, {
    var: item,
    onUpdate: function () {
      var number = Math.ceil(counter.var);
      $('.counter').html(number);
      if(number === counter.var){ count.kill(); }
    },
    onComplete: function(){
      count();
    },
    ease:Circ.easeOut
  });
}

count(487);

  </script>


  </head>
  <body>
        <div class="counter">0</div>
  </body>
</html>
