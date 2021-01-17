@if(session('error'))
<div class="rounded-md flex items-center px-5 py-4 mb-2 border border-theme-9 text-theme-9 dark:border-theme-9"> <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i> {{ session('error') }} <i data-feather="x" class="w-4 h-4 ml-auto"></i>
</div>
@endif




@if(session('success'))
<div class="alert bg-primary fade in">
  <a href="#" class="close" data-dismiss="alert">×</a>
  {{ session('success') }}
</div>
@endif

@if($errors->any())
  @foreach($errors->all() as $allErrors)
  <div class="alert bg-primary fade in">
    <a href="#" class="close" data-dismiss="alert">×</a>
    {{ $allErrors }}
  </div>
  @endforeach
@endif

<!-- For single error -->
<!-- Not used yet -->
@error('')
<div class="alert bg-primary fade in">
  <a href="#" class="close" data-dismiss="alert">×</a>
  {{ $message }}
</div>
@enderror
