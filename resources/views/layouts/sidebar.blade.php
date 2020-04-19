<div class="panel panel-default sidebar-menu">
    <!--panel panel-default sidebar-menu Begin-->
    <div class="panel-heading">
        <h3 class="panel-title">Loại sản phẩm</h3>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">

            <?php
            foreach ($pCat as $key => $value) {
                $p_cat_id = $value->id;

                $p_cat_title = $value->name;

            ?>

                <li class='mar_bot'>

                    <a href='{{url('shop/pCat/'.$p_cat_id.'/1')}}'> {{$p_cat_title}} </a>

                </li>


            <?php } ?>

        </ul>
    </div>
</div>
<!--panel panel-default sidebar-menu Finish-->


<div class="panel panel-default sidebar-menu">
    <!--panel panel-default sidebar-menu Begin-->
    <div class="panel-heading">
        <h3 class="panel-title">Phân loại hãng</h3>
    </div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked category-menu">

            <?php
            foreach ($manufactures as $manufacture) {

                $cat_id = $manufacture->id;

                $cat_title = $manufacture->name;
            ?>

                <li class='mar_bot'>

                    <a href='{{url('shop/manu/'.$cat_id.'/1')}}'> {{$cat_title}} </a>

                </li>


            <?php } ?>


        </ul>
    </div>
</div>
<!--panel panel-default sidebar-menu Finish-->