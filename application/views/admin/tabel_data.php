 <div id="tbl">
  <h3>Tabel</h3>
    <div id="tablewrapper">
        <div id="tableheader">
      `<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
                <div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
                <div><a href="javascript:sorter.reset()">reset</a></div>
            </span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>
                  <th width="2%" class="nosort"><h3>&nbsp;</h3></th>
                  <th width="4%"><h3>ID</h3></th>
                  <th width="26%"><h3>Title</h3></th>
                  <th width="5%"><h3>Status</h3></th>
                  <th width="16%"><h3>Category</h3></th>
                    <th width="11%"><h3>Created by</h3></th>
                    <th width="13%"><h3>Date</h3></th>
                    <th width="5%"><h3>Hits</h3></th>
                    <th width="12%"><h3>Language</h3></th>
                  <th width="8%"><h3 align="center">Action</h3></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" name="checkbox" value="checkbox" />
                    1</td>
                    <td><a href="">Asuransi Harga Benda Bergerak</a></td>
                    <td>
                    <div align="center"><a href="#"><img src="<?php echo base_url('asset/images/admin/img/oke.png');?>" title="Publish"></a>
                    <a href="#"><img src="<?php echo base_url('asset/images/admin/img/delete.png');?>" title="Unpublish" width="16" height="16"></a>                    </div></td>
                    <td>News</td>
                    <td><div align="center"><span id="orange">Admin Master</span> </div></td>
                    <td><div align="center"><span id="abu">2012-12-05</span></div></td>
                    <td><div align="center">123</div></td>
                    <td><div align="center"><span id="blue">Indonesia</span></div></td>
                    <td><div align="center"><a href="#"><img src="<?php echo base_url('asset/images/admin/img/remove.png');?>" width="16" height="16" title="Delete"></a>
                          <a href="#"><img src="<?php echo base_url('asset/images/admin/img/folderup_16.png');?>" width="16" height="16"></a>
                        <a href="#"><img src="<?php echo base_url('asset/images/admin/img/detail.png');?>" title="View"></a> </div></td>
                </tr>
            </tbody>
        </table>
<div id="tablefooter">
          <div id="tablenav">
                <div>
                    <img src="<?php echo base_url('asset/images/admin/first.gif');?>" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="<?php echo base_url('asset/images/admin/previous.gif');?>" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="<?php echo base_url('asset/images/admin/next.gif');?>" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="<?php echo base_url('asset/images/admin/last.gif');?>" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                    <select id="pagedropdown"></select>
                </div>
                <div>
                    <a href="javascript:sorter.showall()">view all</a>
                </div>
    </div>
            <div id="tablelocation">
                <div>
                    <select onchange="sorter.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entries Per Page</span>
                </div>
                <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('asset/js/script.js'); ?>"></script>
    <script type="text/javascript">
    var sorter = new TINY.table.sorter('sorter','table',{
        headclass:'head',
        ascclass:'asc',
        descclass:'desc',
        evenclass:'evenrow',
        oddclass:'oddrow',
        evenselclass:'evenselected',
        oddselclass:'oddselected',
        paginate:true,
        size:10,
        colddid:'columns',
        currentid:'currentpage',
        totalid:'totalpages',
        startingrecid:'startrecord',
        endingrecid:'endrecord',
        totalrecid:'totalrecords',
        hoverid:'selectedrow',
        pageddid:'pagedropdown',
        navid:'tablenav',
        sortcolumn:1,
        sortdir:1,
        sum:[8],
        avg:[6,7,8,9],
        columns:[{index:7, format:'%', decimals:1},{index:8, format:'$', decimals:0}],
        init:true
    });
  </script>
 </div>
</div>