<h1>网络节点</h1>
<br />

<table class="table table-striped table-condensed">
<tr>
  <th>IP地址</th>
  <th>端口</th>
  <th>服务</th>
  <th>版本</th>
  <th>已连接时间</th>
</tr>

<?php
$peers = $_SESSION[$rpc_client]->getpeerinfo();

if (empty($peers)) {
  echo "<tr><td 