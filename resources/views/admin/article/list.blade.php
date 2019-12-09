@extends('layouts.admin')
@section('title', '文章列表')

@section('content')
    <style>
        .mDiv {
            background-color: #FFF;
            color: #333;
            white-space: nowrap;
            display: block;
            position: relative;
            padding: 40px 0px;
            min-height: 30px;
        }

        .ftitle {
            font-size: 0;
            height: 24px;
            float: left;
        }

        .mDiv .ftitle h3 {
            font-size: 14px;
            color: #333;
            margin-right: 6px;
            display: inline-block;
            text-indent: 8px;
            border-left: 2px solid #88B7E0;
        }

        .mDiv .ftitle h5 {
            font-size: 12px;
            font-weight: normal;
            line-height: 19px;
            color: #777;
            vertical-align: bottom;
            letter-spacing: normal;
            display: inline-block;
            padding: 0;
        }

        .fbutton {
            float: right;
            padding-right: 0px;
            margin-right: 0px;
        }

        .fbutton .rows {
            display: flex;
            justify-content: center;
        }

        .fbutton .add {
            width: 150px;
            height: 40px;
            margin-top: -10px;
            padding: 2px 16px;
            color: #fff;
            background-color: #FF6666;
            border-color: #FF6666;
            border-radius: 3px;
        }

        .hDiv {
            background-color: #f7f7f7;
            border: 1px solid #f7f7f7;
        }

        .hDivBox {
            height: 50px;
            line-height: 50px;
        }

        .ncap-form-default dt em {
            font: bold 14px/20px tahoma, verdana;
            color: #F60;
            vertical-align: middle;
            display: inline-block;
            margin-right: 5px;
            margin-left: -14px;
        }

        /*分页*/
        .pagination > li > a, .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination > li > a:hover {
            background: #ddd;
        }
    </style>

    <div class="content">
        <div id="app">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>栏目列表</h3>
                    <h5>(共0条数据)</h5>
                </div>

                <div title="刷新数据" style="float: left"><i class="el-icon-refresh"></i></div>

                {{--vue 提交栏目表单 ajax--}}
                <div class="fbutton">
                    <el-button @click="dialogVisible = true" class="add">
                        <span><i class="fa fa-plus"></i>增加栏目</span>
                    </el-button>
                    <el-dialog
                            :visible.sync="dialogVisible"
                            title="Hello world"
                            style="display: none">
                        <div class="" style="text-align: center">
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>栏目名称</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_name">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>所属栏目</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_belongs">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>栏目类型</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_type">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>跳转链接</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_link">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>SEO标题</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_SEO">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>关键字</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_keyword">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>排序</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_sorting">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>图片</label>
                                </dt>
                                <dd class="opt">
                                    {{--element 图片上传--}}
                                    <el-upload
                                            action="/admin/uploadImage"
                                            list-type="picture-card"
                                            :on-preview="handlePictureCardPreview"
                                            :on-remove="handleRemove"
                                            :on-success="success">
                                        <i class="el-icon-plus"></i>
                                    </el-upload>
                                    <el-dialog :visible.sync="dialogImg">
                                        <img width="100%" :src="dialogImageUrl" alt="">
                                    </el-dialog>
                                </dd>
                            </dl>

                        </div>
                        <span slot="footer" class="dialog-footer">
                            <el-button type="primary" @click="column_submit()">提交</el-button>
                          </span>
                    </el-dialog>
                </div>

                {{--vue 修改栏目表单 ajax--}}
                <div class="fbutton">
                    <el-dialog
                            :visible.sync="columnModify"
                            title="Hello world"
                            style="display: none">
                        <div class="ncap-form-default" style="padding-left: 34px;">
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>栏目名称</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_name">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>所属栏目</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_belongs">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>栏目类型</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_type">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>跳转链接</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_link">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>SEO标题</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_SEO">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>关键字</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_keyword">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>排序</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="column_sorting">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>图片</label>
                                </dt>
                                <dd class="opt">
                                    {{--element 图片上传--}}
                                    <el-upload
                                            action="/admin/uploadImage"
                                            list-type="picture-card"
                                            :on-preview="handlePictureCardPreview"
                                            :on-remove="handleRemove"
                                            :on-success="success">
                                        <i class="el-icon-plus"></i>
                                    </el-upload>
                                    <el-dialog :visible.sync="dialogImg">
                                        <img width="100%" :src="dialogImageUrl" alt="">
                                    </el-dialog>
                                </dd>
                            </dl>

                        </div>
                        <span slot="footer" class="dialog-footer">
                            <el-button type="primary" @click="column_modify_submit">提交</el-button>
                          </span>
                    </el-dialog>
                </div>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellpadding="0" cellspacing="0" style="width: 90%;text-align: center">
                        {{--头部--}}
                        <thead>
                        <tr>
                            <th>
                                <div class="sundefined tc">
                                    ID
                                </div>
                            </th>
                            <th>
                                <div class="sundefined" style="padding-left: 15px">
                                    栏目
                                </div>
                            </th>
                            <th>
                                <div>栏目类型</div>
                            </th>
                            <th>
                                <div>更新时间</div>
                            </th>
                            <th>
                                <div class="tc">点击</div>
                            </th>
                            <th>
                                <div class="tl" style="text-indent: 6px">操作</div>
                            </th>
                        </tr>
                        </thead>

                        {{--给后台数据渲染部分  内容--}}
                        <thead>
                        @if(count($list)>0)
                            @foreach ($list as $sort)

                                <tr>
                                    <td>
                                        <div>
                                            {{$sort->id}}
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            {{$sort->category->name}}
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            @if($sort->category->type == 1)
                                                单页
                                            @elseif($sort->category->type == 2)
                                                列表
                                            @elseif($sort->category->type == 3)
                                                商品
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="tc">{{ $sort->created_at}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="tc">{{ $sort->visits}}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="button" class="el-button add el-button--warning"
                                                    @click="column_modify({{$sort->id}})">
                                                修改
                                            </button>
                                            <button type="button" class="el-button add el-button--danger"
                                                    @click="column_delete({{$sort->id}})">
                                                删除
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach

                        @endif
                        </thead>
                    </table>
                    {{--分页--}}
                    {{$list -> links()}}

                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: function () {
                return {
                    // 提交栏目
                    visible: false,
                    dialogVisible: false,
                    dialogImageUrl: '',
                    column_img: '',
                    dialogImg: false,
                    disabled: false,

                    // 修改栏目
                    columnModify: false,
                }
            },
            methods: {
                //图片上传
                handleRemove(file, fileList) {
                    console.log(file, fileList);
                },
                handlePictureCardPreview(file) {
                    console.log(file)
                    this.dialogImageUrl = file.url;
                    this.dialogVisible = true;
                },
                success(response, file, fileList) {
                    this.column_img = response.data.newFileDir
                },

                //提交
                column_submit() {
                    $.ajax({
                        //请求方式为get
                        type: "POST",
                        //url接口地址
                        url: "/admin/category/add",
                        data: {
                            state: '0',
                            type: $('.column_type').val(),
                            parent_id: $('.column_belongs').val(),
                            name: $('.column_name').val(),
                            dir_name: "",
                            picture: this.column_img,
                            link: $('.column_link').val(),
                            seo_title: $('.column_SEO').val(),
                            keyword: $('.column_keyword').val(),
                            sort: $('.column_sorting').val()
                        },
                        //返回数据格式为json
                        dataType: "json",
                        //请求成功完成后要执行的方法
                        success: function (data) {
                            if (data.code != 200) {
                                alert(data.message)
                            } else {
                                window.location.reload()
                            }
                        }
                    });
                },

                //删除
                column_delete(id) {
                    this.$confirm('确认删除？')
                        .then(_ => {
                            //确定
                            $.ajax({
                                //请求方式为get
                                type: "GET",
                                //url接口地址
                                url: "/admin/category/del/" + id,
                                data: {},
                                //返回数据格式为json
                                dataType: "json",
                                //请求成功完成后要执行的方法
                                success: function (data) {
                                    if (data.code != 200) {
                                        alert(data.message)
                                    } else {
                                        window.location.reload()
                                    }
                                }
                            });
                        })
                        .catch(_ => {
                            //取消
                        });
                },

                //修改
                column_modify(id) {
                    this.columnModify = true
                    $.ajax({
                        //请求方式
                        type: "get",
                        //url接口地址
                        url: "/admin/category/edit/" + id,
                        //返回数据格式为json
                        dataType: "json",
                        //请求成功完成后要执行的方法
                        success: function (data) {
                            if (data.code != 200) {
                                alert(data.message)
                            } else {
                                $('.column_type').val(data.data.type),
                                    $('.column_belongs').val(data.data.parent_id),
                                    $('.column_name').val(data.data.name),
                                    $('.column_link').val(data.data.link),
                                    $('.column_SEO').val(data.data.seo_title),
                                    $('.column_keyword').val(data.data.keyword),
                                    $('.column_sorting').val(data.data.sort)
                                window.column_modify_submit_id = data.data.id
                            }
                        }
                    });
                },
                //修改提交
                column_modify_submit() {
                    $.ajax({
                        //请求方式
                        type: "post",
                        //url接口地址
                        url: "/admin/category/edit/" + column_modify_submit_id,
                        data: {
                            state: '0',
                            type: $('.column_type').val(),
                            parent_id: $('.column_belongs').val(),
                            name: $('.column_name').val(),
                            dir_name: "",
                            picture: this.column_img,
                            link: $('.column_link').val(),
                            seo_title: $('.column_SEO').val(),
                            keyword: $('.column_keyword').val(),
                            sort: $('.column_sorting').val()
                        },
                        //返回数据格式为json
                        dataType: "json",
                        //请求成功完成后要执行的方法
                        success: function (data) {
                            if (data.code != 200) {
                                alert(data.message)
                            } else {

                            }
                        }
                    });
                }
            }
        })
    </script>
@endsection