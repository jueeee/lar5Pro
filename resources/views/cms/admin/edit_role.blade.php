@extends('cms.layouts.cms')
@section('body-content')
    <form class="layui-form form-opRoles layui-form-pane">
        <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">角色称呼：</label>
            <div class="layui-input-inline">
                <input type="text" name="user_name" required lay-verify="required"
                       value="{{$role['user_name']}}"
                       placeholder="请输入昵称" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-form-mid layui-word-aux">请十个字以内</div>
        </div>


        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="1" title="正常"
                       @if ($role['status'] == 1)
                       checked
                       @endif;>
                <input type="radio" name="status" value="-1" title="无效"
                       @if ($role['status'] == -1)
                       checked
                       @endif;>
            </div>
        </div>

        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">备注信息：</label>
            <div class="layui-input-block">
                <textarea placeholder="请输入内容" name="nav_menu_ids" required
                          lay-verify="required" class="layui-textarea">{{$role['nav_menu_ids']}}</textarea>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block div-form-op">
                <button class="layui-btn" type="button" onclick="editRole({{$role['id']}})"
                        lay-submit lay-filter="formDemo">提交</button>
                <button type="reset"  class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

@endsection

@section('single-content')
    <script src="{{asset('cms/js/roles.js')}}"></script>
    <script src="{{asset('cms/js/moZhang.js')}}"></script>
    <script>

        function editRole(id) {
            var postData = $(".form-opRoles").serialize();
            var toUrl = "{{url('cms/admin/editRole',['id'=>'RoleID'])}}";
            toUrl = toUrl.replace('RoleID',id);
            ToPostPopupsDeal(toUrl,postData);
        }
    </script>
@endsection




