<div class="blog">
	<table class="table">
        <thead>
            <tr>
                <th>TT</th>
                <th>Tên</th>
                <th>Hình</th>
                <th>Thời gian</th>
                <th>Loại tin</th>
                <th>Ẩn hiện</th>
                <th>Người đăng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $thutu = 1;
            for ($i=0; $i < 15; $i++) 
            {
                ?>
                <tr>
                    <td class="can-giua"><?=$thutu?></td>
                    <td>[<a href="<?=__URLWEB__.$value->slug?>" target="_blank">Xem</a>]&nbsp;&nbsp;<a href="sua-tin-tuc?id=<?=$value->id?>&page=<?=$page_get?>">Tên</a></td>
                    <td class="can-giua"><img src="public/image/loading.svg" height="40"/></td>
                    <td class="can-giua">Ngày</td>
                    <td class="can-giua">Giờ</td>
                    <td class="can-giua">Hiện</td>
                    <td class="can-giua">Giang</td>
                    <td class="can-giua">
                        <a href="sua-tin-tuc?id=<?=$value->id?>&page=<?=$page_get?>"><i class="fal fa-edit"></i></a>
                        <a onClick="return confirm('Are you sure?')" href="xoa-tin-tuc&id=<?=$value->id?>&page=<?=$page_get?>"><i class="fal fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php
                $thutu ++;
            }
            ?>
        </tbody>
    </table>

    <div class="page">
        <ul>
            <a href="#tab-main"><li>1</li></a>
            <a href="#tab-main"><li>1</li></a>
            <a href="#tab-main"><li>1</li></a>
            <a href="#tab-main"><li>1</li></a>
            <a href="#tab-main"><li>1</li></a>
            <li class="active">1</li>
        </ul>
    </div>
    
</div>