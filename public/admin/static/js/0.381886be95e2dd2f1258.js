webpackJsonp([0],{p8ff:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i,a=n("OMN4"),d=(i=a)&&i.__esModule?i:{default:i};var r="//cms.com";e.default={webinfo:function(t){return d.default.post(r+"/admin/webInfo/basic",t)},bannerList:function(t,e){return d.default.get(r+"/admin/banner/list?perPage="+t+"&page="+e)},bannerAdd:function(t){return d.default.post(r+"/admin/banner/add",t)},bannerDetails:function(t){return d.default.get(r+"/admin/banner/edit/"+t)},bannerEdit:function(t,e){return d.default.post(r+"/admin/banner/edit/"+t,e)},categoryList:function(t,e){return d.default.get(r+"/admin/category/list?perPage="+t+"&page="+e)},categoryAdd:function(t){return d.default.post(r+"/admin/category/add",t)},categoryAddChild:function(t){return d.default.post(r+"/admin/category/add",t)},categoryDetails:function(t){return d.default.get(r+"/admin/category/edit/"+t)},categoryEdit:function(t,e){return d.default.post(r+"/admin/category/edit/"+t,e)},articleList:function(t,e){return d.default.get(r+"/admin/article/list?perPage="+t+"&page="+e)},articleAdd:function(t){return d.default.post(r+"/admin/article/add",t)},articleDetails:function(t){return d.default.get(r+"/admin/article/edit/"+t)},articleEdit:function(t,e){return d.default.post(r+"/admin/article/edit/"+t,e)},friendLinkList:function(t,e){return d.default.get(r+"/admin/friendLink/list?perPage="+t+"&page="+e)},friendLinkAdd:function(t){return d.default.post(r+"/admin/friendLink/add",t)},friendLinkDetails:function(t){return d.default.get(r+"/admin/friendLink/edit/"+t)},friendLinkEdit:function(t,e){return d.default.post(r+"/admin/friendLink/edit/"+t,e)},recruitmentList:function(){return d.default.get(r+"/admin/recruitment/list")},recruitmentAdd:function(t){return d.default.post(r+"/admin/recruitment/add",t)},recruitmentDetails:function(t){return d.default.get(r+"/admin/recruitment/edit/"+t)},recruitmentEdit:function(t,e){return d.default.post(r+"/admin/recruitment/edit/"+t,e)},customList:function(t,e){return d.default.get(r+"/admin/customData/list?perPage="+t+"&page="+e)},customAdd:function(t){return d.default.post(r+"/admin/customData/add",t)},customDetails:function(t){return d.default.get(r+"/admin/customData/edit/"+t)},customEdit:function(t,e){return d.default.post(r+"/admin/customData/edit/"+t,e)},msgList:function(t,e){return d.default.get(r+"/admin/message/list?perPage="+t+"&page="+e)},msgDetails:function(t){return d.default.get(r+"/admin/message/edit/"+t)}}},qzrg:function(t,e,n){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i,a=n("p8ff"),d=(i=a)&&i.__esModule?i:{default:i};e.default={cmsApi:d.default}}});