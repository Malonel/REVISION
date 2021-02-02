
<?php
if (empty($_GET['q'])) { ?>

<h1>Query API(试运行)</h1><hr />

<div class="row-fluid">
  <div class="span5">

	<h3>Network Data</h3>
	<p>
	  <a href="./?q=getdifficulty">getdifficulty(可用)</a> - current mining difficulty<br />
	  <a href="./?q=getblockcount">getblockcount(可用)</a> - current block height<br />
	  <a href="./?q=getlasthash">getlasthash(可用)</a> - hash of latest block
	</p>

	<h3>Coin Data</h3>
	<p>
	  <a href="./?q=blockreward">blockreward</a> - current block reward<br />
	  <a href="./?q=moneysupply">moneysupply(可用)</a> - total coins mined<br />
	  <a href="./?q=unminedcoins">unminedcoins</a> - total unmined coins<br />
	  <a href="./?q=runtime">runtime</a> - time since first block (secs)
	</p>

	<h3>Transaction Data</h3>
	<p>
	  <a href="./?q=txinput">txinput</a>/TxHash - total tx input value<br />
	  <a href="./?q=txoutput">txoutput</a>/TxHash - total tx output value<br />
	  <a href="./?q=txfee">txfee</a>/TxHash - tx fee value (inputs - outputs)<br />
	  <a href="./?q=txcount">txcount</a> - number of tx's in blockchain
	</p>

	<h3>Address Data</h3>
	<p>
	  <a href="./?q=addressbalance">addressbalance(可用)</a>/Address/Confs - balance of address<br />
	  <a href="./?q=addresslimit">addresslimit</a>/Address/Confs - withdrawal limit of address<br />
	  <a href="./?q=addresslastseen">addresslastseen</a>/Address - block when address last used<br />
	  <a href="./?q=addresscount">addresscount</a> - number of non-empty addresses
	</p>

	<h3>JSON Data</h3>
	<p>
	  <a href="./?q=getinfo">getinfo(可用)</a> - general information<br />
	  <a href="./?q=txinfo">txinfo</a>/TxHash - transaction information<br />
	  <a href="./?q=addressinfo">addressinfo</a>/Address/Confs - address information<br />
	  <a href="./?q=blockinfo">blockinfo</a>/BlockHash - block information
	</p>
	<h3>Others</h3>
	<p>
	  <a href="./?q=uptime">uptime(可用)</a> - data update time<br />
	</p>
  </div>
  <div class="span7">

	<h2>部分API使用方法</h2>
	<p>获取当前网络难度:</p>
	<pre>/?q=getdifficulty</pre>
	<p>获取当前区块高度:</p>