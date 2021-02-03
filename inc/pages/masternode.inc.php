
<center><h1><?php echo $curr_name;?>全网主节点</h1></center>
<br />
<?php
	error_reporting(0);
	$mcn= 50000; //masternode coin number
	$mrw= 56;  //masternode reward
	$url="http://coin78.com/api/trade/ticker?market=jrg_cny";
	$price=get($url);
	//$price = 0.04;
	$count = $_SESSION[$rpc_client]->masternode("count");
	if($count == 0) 
		$count=1;
	$val=$price*$count*$mcn;
	$profit=round($price*$mrw*1440/$count);
	$pnh=round(365*$mrw*1440*100/$count/$mcn)."%";//年化收益
	echo "<p>当前全网在线主节点:<b><font color='red' size='16px'>".$count."</b></font>个,价值:<b><font color='red' size='16px'>".$val."</b></font>元; 每主节点收益(24h): <b><font color='red' size='16px'>".$profit."</b></font>元;平均年化收益率: <b><font color='red' size='16px'>".$pnh."</b></font></p>";	
	function get($url){
		if(function_exists('file_get_contents'))
		{
			$file_contents = file_get_contents($url);
		}
		$res1 = explode(':',$file_contents);
		$m=$res1[2];
		$res2 = explode(',',$m);
		$n=$res2[0];
		$p1=substr($n,0,-1);
		$p2=substr($p1,3);
		$p= round(floatval($p2),3)/100000000;		
		return $p;	
	}
	$nh = round(365*$mrw*1440*100/$count/$mcn,2);//年化收益
	$pnum=$price*$mcn;
	$dnum=round(1*1*$price*$mrw*1440/$count,2);
	$mnum=round(30*1*$price*$mrw*1440/$count,2);
	$ynum=round(365*1*$price*$mrw*1440/$count,2);
	echo "<table class='table table-striped table-condensed'>
	<tr>
		<th width='80px' >主节点数量</th>		
		<th width='80px'>主节点币数</th>
		<th width='80px'>主节点成本</th>
		<th width='80px'>平均1天收益</th>
		<th width='80px'>平均1月收益</th>
		<th width='80px'>平均1年收益</th>
		<th width='80px'>年化收益</th>
		<th width='80px'>当前币价</th>
		<th width='80px'>全网主节点</th>
	</tr>
	<tr >
		<td ><input id='node' style='width:50px;height:12px;' type='text' value='1' onKeyUp='mycount1(this.value)'></td>
		<td id='cnum'>".$mcn."</td>
		<td id='pnum'>".$pnum."</td>
		<td id='dnum'>".$dnum."</td>
		<td id='mnum'>".$mnum."</td>
		<td id='ynum'>".$ynum."</td>
		<td id='nh'>".$nh."%</td>
		<td id='pri'>".$price."</td>
		<td ><input id='allnode' style='width:50px;height:12px;' type='text' value='".$count."' onKeyUp='mycount2(this.value)'></td>
	</tr>
</table>";
?>
<p>【Ctrl+F】可搜索节点IP是否在线.&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://my.mnode.win/jrg/config.php?id=1" target="_blank"><b><font color="blue"><img src="./img/mnlogo.jpg">主节点麻烦？来金融股节点大师托管你的节点吧！</font></b></a></p>
<div id="latest">
<table class="table table-striped table-condensed" id="tb1">
<tr>
  <th>地址</th>
  <th>公钥</th>
  <th>版本</th>
  <th>状态</th>
  <th>在线时长</th>
</tr>
<?php
$nodes = $_SESSION[$rpc_client]->masternode("list","full");

if (empty($nodes)) {
  echo "<tr><td colspan='5'>There are currently 0 connected masternodes.</td></tr>";
} else {
	foreach ($nodes as $key => $value) {
		$node_info = explode(' ',$value);
		$m=0;
		for($i=8;$i<20;$i++){
			if($node_info[$i] != ''){
				if($m == 0)
					$m = $i;
				else break;
			}		
		
		}
		$ht1 = intval($node_info[$m]/3600);
		if($ht1 >=24 )
			$dt= intval($ht1/24);					
		else
			$dt=0;		
		$ht = $ht1-24*$dt;	
		$mt = intval(($node_info[$m]-$ht1*3600)/60);
		$dt = sprintf("%03d", $dt);		
		$ht = sprintf("%02d", $ht);
		$mt = sprintf("%02d", $mt);
		echo  "<tr><td>".
	       $node_info[6]."</td><td>
		   <a href='./?address=".$node_info[5]."' target='_blank'>".$node_info[5]."</a></td><td>".
		   $node_info[4]."</td><td>".
		   "Online"."</td><td>".
		   $dt."天".$ht."时".$mt."分"."</td></tr>";
		   
	}
	}


?>
</table>