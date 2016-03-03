<div class="row">
    <div class="col-md-6">
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', $categories, $selectedCategory,['id'=>'category','class'=>'form-control',  'required']) !!}

<script type="text/javascript">
    $('#category').select2({
        placeholder: 'Choose a category',
        minimumResultsForSearch:-1,
    });
</script>
</div>
    </div>
        <div class="col-md-6">
<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tags, $selectedTags,['id'=>'tags','class'=>'form-control', 'multiple', 'required']) !!}
</div>
<script type="text/javascript">
    $('#tags').select2({
            placeholder: 'Add/Choose some tags',
            tags:true
            });
</script>
</div>
</div>
