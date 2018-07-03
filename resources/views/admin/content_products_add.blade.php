<div class="wrapper container-fluid">

	{!! Form::open(['url' => route('productStore'),'class'=>'form-horizontal','method'=>'post','enctype'=>'multipart/form-data']) !!}
 	
	
	<div class="form-group">
		
		{!! Form::label('name','Название',['class' => 'col-xs-2 control-label'])   !!}
		<div class="col-xs-8">
			{!! Form::text('name',old('name'),['class' => 'form-control','placeholder'=>'Введите название страницы'])!!}
		</div>
	
	</div>

	
	<div class="form-group">
	     {!! Form::label('alias', 'Псевдоним:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::text('alias', old('alias'), ['class' => 'form-control','placeholder'=>'Введите псевдоним страницы']) !!}
		 </div>
    </div>
    
    <div class="form-group">
	     {!! Form::label('text', 'Текст:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::textarea('text', old('text'), ['id'=>'editor','class' => 'form-control','placeholder'=>'Введите текст страницы']) !!}
		 </div>
    </div>
	<div class="form-group">

		{!! Form::label('date_start','Начало периода',['class' => 'col-xs-1 control-label'])   !!}
		<div class="col-xs-2">
			{!! Form::date('date_start',old('date_start'),['class' => 'form-control','placeholder'=>'Введите введите нало периода'])!!}
		</div>
		{!! Form::label('date_end','Конец периода',['class' => 'col-xs-1 control-label'])   !!}
		<div class="col-xs-2">
			{!! Form::date('date_end',old('date_end'),['class' => 'form-control','placeholder'=>'Введите введите конец периода'])!!}
		</div>
		{!! Form::label('price','Стоимость',['class' => 'col-xs-1 control-label'])   !!}
		<div class="col-xs-2">
			{!! Form::text('price',old('price'),['class' => 'form-control','placeholder'=>'Введите стоимость'])!!}
		</div>

	</div>
    
    <div class="form-group">
	     {!! Form::label('images', 'Изображение:',['class'=>'col-xs-2 control-label']) !!}
	     <div class="col-xs-8">
		 	{!! Form::file('images', ['class' => 'filestyle','data-buttonText'=>'Выберите изображение','data-buttonName'=>"btn-primary",'data-placeholder'=>"Файла нет"]) !!}
		 </div>
    </div>
    
    
      <div class="form-group">
	    <div class="col-xs-offset-2 col-xs-10">
	      {!! Form::button('Сохранить', ['class' => 'btn btn-primary','type'=>'submit']) !!}
	    </div>
	  </div>


	{!! Form::close() !!}
	
	<script>
		CKEDITOR.replace('editor');
	</script>
	
</div>
