<div class="topk2">
<script type="text/javascript">
	</script>
</div>

</div>

<div id="footer">
<p>
</p>
<p></p>
</div>
</div>
<div style="display:none;">
<script type="text/javascript">
<?php if('seo' == $_a){ ?>
function getEvent(evnt) {
  if(event.keyCode==39){
    self.location=xia.href;
  }
} 
document.onkeydown = getEvent;
if (top.location != self.location){
  top.location=self.location; 
}
var sec=0;
var min=0;
var hou=0;
flag=0;
idt=window.setTimeout("qian_li();",1000);
function qian_li()
{
sec++;
if(sec==60){sec=0;min+=1;}
if(min==60){min=0;hou+=1;}
if((min>0)&&(flag==0))
{
// window.alert("您刚刚来了1分钟!可别急着走开，还有好多好东东等着您呢!");
 flag=1;
}
document.getElementById("qian_li_v").innerHTML=hou+"小时"+min+"分"+sec+"秒";
idt=window.setTimeout("qian_li();",1000);
}
<?php if($auto && $page > 0){ ?>
setTimeout('location="/seos/seo/<?php echo $auto,'/',$st,'/',$page-1,'/?url=',$kw;?>"',<?php echo $st;?>*1000);
<?php } ?>
function killErrors() {
return true;
}
window.onerror = killErrors;

<?php } ?>
</script>
</div>
</body>
</html>
