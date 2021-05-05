@if(session('status'))
<div class="alert" style="background-image: linear-gradient(to right, #a2c2d4, #7effe3);">
  <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{session('status')}}</strong>
</div>
@endif