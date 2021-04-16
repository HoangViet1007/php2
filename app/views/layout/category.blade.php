<div class="col-md-2">
    <div id="menu_lh">
        <ul style="display: block;">
            <div class="tt-sp">
                <h4>DANH MỤC SẢN PHẨM</h4>
            </div>
            @foreach($cates as $cates)
            <li>
                <a href="./product-cate?id={{$cates->id}}">{{$cates->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>