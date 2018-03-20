@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="text-align: center">
        <div class="col-md-12">
     <input type="text" name="searchquery" id="search" placeholder="Start typing to search">
      <a href="/home" class="btn btn-primary"> Back </a>
 </div></div><br>

    <div class="row justify-content-center">  

         <div class="col-md-8" id='results'>

    </div>
    
</div>
<script type="text/javascript">
      $(document).ready(function(){
        getResults("");


          $("#search").on('keyup', function(){
             $search = $(this).val();
             getResults($search);
            
          });
     });
      function getResults(search){
         $.ajax({
                     type: 'post',
                     url: '{{ route('search') }}',
                     data: {'search': search, '_token': '{{csrf_token()}}'},
                     success: function(data){
                        $('#results').html(''+formatResults(data)+'');
                     }

              });
      }
      function formatResults(data){
            var show = '';
            for(var i =0;i<data.length;i++){
                show+='<div class="card"><div class="card-header"></div><div class="company">' + data[i].name +'</div><div class="card-body"><p class="max-lines">'+ data[i].about +'</p><br><div style="text-align: right"><a href="/home/workad/'+ data[i].id +'" class="btn btn-info">view</a><a href="/home/company/'+ data[i].user_id +'" class="btn btn-info"> about company </a></div></div></div>'
            }
            if(show == ''){
                show+=' <div style="text-align: center"> No results </div>';
            }
            return show;
      }
 </script>
@endsection