@extends('layouts.admin')
@section('title', '在线留言列表')

@section('content')

    <style>
        em {
            font: bold 14px/20px tahoma, verdana;
            color: #F60;
            vertical-align: middle;
            display: inline-block;
            margin-right: 5px;
            margin-left: -14px;
        }

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
                    <h3>链接列表</h3>
                    <h5>(共0条数据)</h5>
                </div>

                <div title="刷新数据" style="float: left"><i class="el-icon-refresh"></i></div>
                {{--vue 修改栏目表单 ajax--}}
                <div class="fbutton">
                    <el-dialog
                            :visible.sync="linkModify"
                            title="Hello world"
                            style="display: none">
                        <div class="" style="text-align: center">
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>标题</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="web_title">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>姓名</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="web_name">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>联系电话</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="web_phone">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>电子邮箱</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="web_email">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>联系地址</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="web_address">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em></em>留言内容</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" value="" class="web_content">
                                </dd>
                            </dl>

                        </div>

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
                                    标题
                                </div>
                            </th>
                            <th>
                                <div>
                                    姓名
                                </div>
                            </th>
                            <th>
                                <div class="tc">
                                    联系电话
                                </div>
                            </th>
                            <th>
                                <div class="tc">
                                    联系地址
                                </div>
                            </th>
                            <th>
                                <div class="tc">
                                    阅读状态
                                </div>
                            </th>
                            <th>
                                <div class="tl" style="text-indent: 6px">
                                    操作（已发布,修改,删除）
                                </div>
                            </th>
                        </tr>
                        </thead>
                        {{--给后台数据渲染部分  内容--}}
                        <thead>
                        @foreach ($list as $sort)
                            <tr>
                                <td>
                                    <div>
                                        {{ $sort->id}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $sort->title}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $sort->name}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $sort->phone}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $sort->address}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        @if($sort->state == 1)
                                            已查看
                                        @elseif($sort->state == 0)
                                            未查看
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button type="button" class="el-button add el-button--warning"
                                                @click="link_modify({{$sort->id}})">
                                            查看
                                        </button>
                                        <button type="button" class="el-button add el-button--danger"
                                                @click="link_delete({{$sort->id}})">
                                            删除
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
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
                    link_img: '',
                    dialogImg: false,
                    disabled: false,

                    // 修改栏目
                    linkModify: false,

                    //发布状态
                    link_state: '',
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
                    this.link_img = file.url
                },

                //删除
                link_delete(id) {
                    this.$confirm('确认删除？')
                        .then(_ => {
                            //确定
                            $.ajax({
                                //请求方式为get
                                type: "GET",
                                //url接口地址
                                url: "/admin/message/del/" + id,
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
                link_modify(id) {
                    this.linkModify = true
                    $.ajax({
                        //请求方式
                        type: "get",
                        //url接口地址
                        url: "/admin/message/edit/" + id,
                        //返回数据格式为json
                        dataType: "json",
                        //请求成功完成后要执行的方法
                        success: function (data) {
                            if (data.code != 200) {
                                alert(data.message)
                            } else {
                                $('.web_title').val(data.data.title),
                                    $('.web_name').val(data.data.name),
                                    $('.web_phone').val(data.data.phone),
                                    $('.web_email').val(data.data.email),
                                    $('.web_address').val(data.data.address),
                                    $('.web_content').val(data.data.content),
                                    window.link_modify_submit_id = data.data.id
                            }
                        }
                    });
                },
                //修改提交
            }
        })
    </script>


@endsection