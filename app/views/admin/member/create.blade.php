@extends('admin.layouts')

{{-- styles_src --}}
@section('styles_src')
<link href="{{{ asset('assets/css/datetimepicker.css') }}}" rel="stylesheet">
@stop

{{-- script --}}
@section('script')
<script src="{{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}}"></script>
<script src="{{{ asset('assets/js/bootstrap-datetimepicker.zh-CN.js') }}}"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
</script>
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h3>
        <div class="pull-right">
            <a href="{{ route('member') }}" class="btn btn-small btn-inverse"><i
                    class="icon-circle-arrow-left icon-white"></i> 返回</a>
        </div>

        创建客户
    </h3>
</div>

<form class="form-horizontal" method="post" action="" autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

    <div class="control-group {{ $errors->has('bn') ? 'error' : '' }}">
        <label class="control-label" for="bn">客户编号</label>
        <div class="controls">
            <input type="text" name="bn" id="bn" value="{{ Input::old('bn') }}"/>
            {{ $errors->first('bn', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
        <label class="control-label" for="name">客户姓名</label>
        <div class="controls">
            <input type="text" name="name" id="name" value="{{ Input::old('name') }}"/>
            {{ $errors->first('name', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('email') ? 'error' : '' }}">
        <label class="control-label" for="email">邮箱</label>
        <div class="controls">
            <input type="text" name="email" id="email" value="{{ Input::old('email') }}"/>
            {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('mobile') ? 'error' : '' }}">
        <label class="control-label" for="mobile">手机号码</label>
        <div class="controls">
            <input type="text" name="mobile" id="mobile" value="{{ Input::old('mobile') }}"/>
            {{ $errors->first('mobile', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('product') ? 'error' : '' }}">
        <label class="control-label" for="product">服务产品</label>
        <div class="controls">
            @if ($products->count() >= 1)
            @foreach ($products as $product)
            <label class="checkbox inline">
                <input type="checkbox" name="product[]" id="product_{{ $product->id }}" value="{{ $product->id }}"> {{ $product->name }}
            </label>
            @endforeach
            @else
                <span class="help-inline">请先添加产品</span>
            @endif
            {{ $errors->first('product', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('start_time') ? 'error' : '' }}">
        <label class="control-label" for="start_time">服务开始时间</label>
        <div class="controls date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="start_time">
            <input type="text" value="{{ Input::old('start_time') }}" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
            <input type="hidden" id="start_time" name="start_time" value="{{ Input::old('start_time') }}" />
            {{ $errors->first('start_time', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('end_time') ? 'error' : '' }}">
        <label class="control-label" for="end_time">服务结束时间</label>
        <div class="controls date form_datetime" data-date="" data-date-format="yyyy-mm-dd hh:ii:ss" data-link-field="end_time">
            <input type="text" value="{{ Input::old('end_time') }}" readonly>
            <span class="add-on"><i class="icon-remove"></i></span>
            <span class="add-on"><i class="icon-th"></i></span>
            <input type="hidden" id="end_time" name="end_time" value="{{ Input::old('end_time') }}" />
            {{ $errors->first('end_time', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{ $errors->has('operator_id') ? 'error' : '' }}">
        <label class="control-label" for="operator_id">绑定客服</label>
        <div class="controls">
            <select name="operator_id" id="operator_id">
                @if ($operators->count() >= 1)
                @foreach ($operators as $operator)
                    <option value="{{ $operator->id }}" >{{ $operator->name }}</option>
                @endforeach
                @else
                    <option value="0">请先添加客服</option>
                @endif
            </select>
            {{ $errors->first('operator_id', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        <label class="control-label" for="password">密码</label>
        <div class="controls">
            <input type="password" name="password" id="password" value="" />
            {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <div class="control-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
        <label class="control-label" for="password_confirmation">确认密码</label>
        <div class="controls">
            <input type="password" name="password_confirmation" id="password_confirmation" value="" />
            {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
        </div>
    </div>

    <!-- Form Actions -->
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">创建</button>
            <button type="reset" class="btn">重置</button>
            <a class="btn btn-link" href="{{ route('member') }}">取消</a>
        </div>
    </div>
</form>
@stop