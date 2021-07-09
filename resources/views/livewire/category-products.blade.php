<div>
    <div class="glider-contain">
        <ul class="glider">
          @foreach ($category->subcategories as $product)    
            <li>
                {{$product}}
            </li>
          @endforeach
        </ul>
      
        <button aria-label="Previous" class="glider-prev">«</button>
        <button aria-label="Next" class="glider-next">»</button>
        <div role="tablist" class="dots"></div>
      </div>
</div>
