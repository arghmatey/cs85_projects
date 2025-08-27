<ul>
@foreach($items as $item)
    <li>{{ $item->item_name }} ({{ $item->quantity }}) - {{ $item->category }}</li>
@endforeach
</ul>

<!-- 
Reflection: 
I think the hardest part was learning migrations though I know they are easier for teams.

Debugging took some time. I had to drop duplicate tables because of migration errors and figure out why my Item model wasn't loading. I also had to doulbe check the controller path because it couldn't be found at first. I feel like some of the steps were out of order and I could have benefited from reading everything and understanding the process before diving in. 
-->