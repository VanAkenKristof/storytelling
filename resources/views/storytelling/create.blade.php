@extends('master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create your story <small>by filling in all fields below.</small></h5>
                </div>
                <div class="ibox-content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" class="form-horizontal" action="{{ route('storytelling.save') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="race">Race</label>

                            <div class="col-sm-10">
                                <select class="form-control m-b" name="race" title="race">
                                    <option value="">-- Select a Race --</option>
                                    @foreach($races as $race)
                                        <option value="{{ $race->id }}" {{ old('race') != $race->id ?: "selected" }}>{{ $race->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="class">Class</label>

                            <div class="col-sm-10">
                                <select class="form-control m-b" id="class" name="class" title="class">
                                    <option value="">-- Select a Class --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" {{ old('class') != $class->id ?: "selected" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach($classes as $class)
                            <div class="form-group subclass" id="subclass-{{ $class->id }}" style="display: none;">
                                <label class="col-sm-2 control-label" for="subclass">Subclass</label>

                                <div class="col-sm-10">
                                    <select class="form-control m-b" name="subclass[{{ $class->id }}]" title="subclass">
                                        <option value="">-- Select a Subclass --</option>
                                        @foreach($class->subClasses as $subclass)
                                            <option value="{{ $subclass->id }}" {{ (old('subclass')[$class->id] != $subclass->id) ?: "selected" }}>{{ $subclass->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="background">Background</label>

                            <div class="col-sm-10">
                                <select class="form-control m-b" name="background" title="background">
                                    <option value="">-- Select a Race --</option>
                                    @foreach($backgrounds as $background)
                                        <option value="{{ $background->id }}" {{ old('background') != $background->id ?: "selected" }}>{{ $background->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Character Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" title="name" name="name" placeholder="Character Name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Character Age</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" title="age" name="age" placeholder="Character Age" value="{{ old('age') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name">Character Backstory</label>
                            <div class="col-sm-10">
                                <textarea data-autoresize rows="2" class="form-control textarea" title="backstory" name="backstory" placeholder="Character Backstory">{{ old('backstory') }}</textarea>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <input class="btn btn-primary" type="submit" value="Create Story">
                                <a class="btn btn-white" href="{{ route('storytelling.index') }}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="/js/autoresizetextareas.js"></script>

    <script>
        $(document).ready(function () {
            $('#class').change(function () {
                var classId = $(this).val();

               $('.subclass').hide();
               $('#subclass-' + classId).show();

            });

            $("#class").trigger('change');
        });
    </script>
@endsection