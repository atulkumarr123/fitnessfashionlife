<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tags[]', $tags, $selectedTags,['id'=>'tags','class'=>'form-control', 'multiple', 'required']) !!}
</div>
<script type="text/javascript">
    $('select').select2({
            placeholder: 'Choose a tag',
            tags:true
            });
</script>