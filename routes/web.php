<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::middleware(['auth'])->group(function ()
{
    //行业分类
    Route::get('/','IndexController@Index');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('/article/categories','ArticleCategoryController@ArticleCategoryLists')->name('articlecategorylists');
    Route::get('/article/category/anysis','ArticleCategoryController@ArticleCategoryAnysis');
    Route::get('/article/category/add','ArticleCategoryController@ArticleCategoryAdd');
    Route::post('/article/category/add','ArticleCategoryController@PostArticleCategoryAdd')->name('articlecategoryadd');
    Route::get('/article/category/edit/{id}','ArticleCategoryController@ArticleCategoryEdit');
    Route::put('/article/category/edit/{id}','ArticleCategoryController@PostArticleCategoryEdit')->name('articlecategoryedit');

    //品牌介绍
    Route::get('/brandinfo/lists','BrandInfoController@BrandInfoLists')->name('brandinfolists');
    Route::get('/brandinfo/add','BrandInfoController@BrandInfoAdd');
    Route::post('/brandinfo/add','BrandInfoController@PostBrandInfoAdd')->name('brandinfoadd');
    Route::get('/brandinfo/edit/{id}','BrandInfoController@BrandInfoEdit');
    Route::put('/brandinfo/edit/{id}','BrandInfoController@PostBrandInfoEdit')->name('brandinfoedit');
    Route::get('/brandinfo/delete/{id}','BrandInfoController@Delete');
    Route::post('/search/brand', 'BrandInfoController@BrandSearch');
    //内容分类
    Route::get('/article/types','ArticleTypeController@ArticletypeLists')->name('articletypelists');
    Route::get('/article/type/add','ArticleTypeController@ArticletypeAdd');
    Route::post('/article/type/add','ArticleTypeController@PostArticletypeAdd')->name('articletypeadd');
    Route::get('/article/type/edit/{id}','ArticleTypeController@ArticletypeEdit');
    Route::put('/article/type/edit/{id}','ArticleTypeController@PostArticletypeEdit')->name('articletypeedit');
    //内容数据导入
    Route::get('/article/articletype/list/{id}', 'ArticleController@ArticleTypeLists')->name('articlelisttype');
    Route::get('/article/fmcontentimport', 'ArticleController@FmImportContents');
    Route::post('/article/fmcontentimport', 'ArticleController@PostFmImportContents')->name('fmimportcontents');
    Route::get('/article/edit/{id}', 'ArticleController@ArticleEdit');
    Route::put('/article/edit/{id}', 'ArticleController@PostArticleEdit')->name('article_edit');
    Route::get('/article/delete/{id}/{type}', 'ArticleController@Delete');
    //标题分类
    Route::get('/title/titlecategory/lists', 'TitleCategoryController@TitleCategoryList');
    Route::get('/title/titlecategory/add', 'TitleCategoryController@TitleCategoryAdd');
    Route::post('/title/titlecategory/add', 'TitleCategoryController@PostTitleCategoryAdd')->name('titlecategoryadd');
    Route::get('/title/titlecategory/edit/{id}', 'TitleCategoryController@TitleCategoryEdit');
    Route::put('/title/titlecategory/edit/{id}', 'TitleCategoryController@PostTitleCategoryEdit')->name('titlecategoryedit');
    //标题数据导入
    Route::get('/title/lists/{id}', 'TitleController@TitleLists');
    Route::get('/title/fmcontentimport', 'TitleController@FmImportTitles');
    Route::post('/title/fmcontentimport', 'TitleController@PostFmImportTitles')->name('fmimport_titles');
    Route::get('/title/edit/{id}', 'TitleController@TitleEdit');
    Route::put('/title/edit/{id}', 'TitleController@PostTitleEdit')->name('title_edit');
    Route::get('/title/delete/{id}/{type}', 'TitleController@Delete');
    //用户管理
    Route::get('/user/lists', 'UserController@UserLists');
    Route::get('/user/add', 'UserController@Register');
    Route::post('/user/add', 'UserController@PostRegister');
    Route::get('/user/edit/{id}', 'UserController@Edit');
    Route::put('/user/edit/{id}', 'UserController@postEdit');
    Route::get('/user/delete/{id}', 'UserController@Delete');
    Route::get('/user/anysis', 'UserController@Anysis');
    Route::any('/user/data/infos', 'UserController@DataInfos')->name('userdatainfo');
    //违禁词汇
    Route::get('guarded_keywoeds','GuardedKeywordsController@getGuardedKeywords');
    Route::get('guarded_edit_keywoeds','GuardedKeywordsController@editGuardedKeywords');
    Route::post('guarded_edit_keywoeds_post','GuardedKeywordsController@postEditGuardedKeywords')->name('edit_guarded_keywords');
    //others
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/create/article', 'CreateArticleController@CreateArticle');
    Route::post('/create/article', 'CreateArticleController@PostCreateArticle')->name('articlecreate');
    Route::get('/create/brandarticle', 'CreateArticleController@CreateBrandArticle');
    Route::post('/create/brandarticle', 'CreateArticleController@PostCreateBrandArticle')->name('brandarticlecreate');
    //品牌搜索
    Route::post('/search/brand', 'BrandInfoController@BrandSearch');
    //获取站点分类
    Route::get('/website/lists', 'WebsiteCategoryController@WebSIteLists');
    Route::get('/website/add', 'WebsiteCategoryController@WebSIteAdd');
    Route::post('/website/add', 'WebsiteCategoryController@PostWebSIteAdd')->name('websiteadd');
    Route::get('/website/edit/{id}', 'WebsiteCategoryController@WebSIteEdit');
    Route::put('/website/edit/{id}', 'WebsiteCategoryController@PostWebSIteEdit')->name('postwebsiteedit');
    Route::post('/website/gettidinfo', 'WebsiteCategoryController@GetWebsiteTid');
    Route::post('/website/getsontypes', 'WebsiteCategoryController@GetWebsiteSontypes');
    Route::post('/website/getbdname', 'WebsiteCategoryController@GetWebsiteBdname');
    Route::post('/website/getnavsinfo', 'WebsiteCategoryController@GetWebsitenavs');
    Route::post('/website/getbrandpic', 'WebsiteCategoryController@GetBrandPics');
    Route::post('/website/article/push', 'WebsiteCategoryController@PostArticlePush')->name('articlepush');
    Route::post('/website/brandarticle/push', 'WebsiteCategoryController@PostBrandArticlePush')->name('brandarticlepush');
    Route::post('/website/getprovince', 'WebsiteCategoryController@GetProvinces');
    Route::post('/website/getcitys', 'WebsiteCategoryController@GetCitys');
    Route::post('/website/getinvestments', 'WebsiteCategoryController@getInvestments');
    Route::post('/website/getacreagements', 'WebsiteCategoryController@getAcreagements');
    //加盟费用管理
    Route::get('/payment/categorylists', 'PaymentCategoryController@PaymentCategoryList');
    Route::get('/payment/categoryadd', 'PaymentCategoryController@PaymentAdd');
    Route::post('/payment/categoryadd', 'PaymentCategoryController@PostPaymentAdd')->name('paymengcategoryadd');
    Route::get('/payment/categoryedit/{id}', 'PaymentCategoryController@PaymentEdit');
    Route::put('/payment/categoryedit/{id}', 'PaymentCategoryController@PostPaymentEdit')->name('paymengcategoryedit');

    Route::get('/payment/lists', 'PaymentController@PaymentList');
    Route::get('/payment/add', 'PaymentController@Paymentadd');
    Route::post('/payment/add', 'PaymentController@PostPaymentadd')->name('paymentadd');
    Route::get('/payment/edit/{id}', 'PaymentController@Paymentedit');
    Route::put('/payment/edit/{id}', 'PaymentController@PostPaymentedit')->name('paymentedit');
    Route::post('/payment/info', 'PaymentController@getSignPayment');
    Route::get('/payment/generate', 'PaymentController@Paymentgenerate');
    Route::post('/payment/generate', 'PaymentController@PostPaymentgenerate')->name('paymentgenerate');
    //articlecollect
    Route::post('/articlecollect/regenerate', 'ArticleCollectController@PostRegenerate');
    //图片上传
    Route::post('/fileuploads', 'UploadImagesController@UploadImage');

    //智能创作平台
    Route::post('/baidunpl/getecnet', 'BaiduNlpController@Ecnet');
    //others
    Route::get('/brandmain/lists', 'BrandInfoController@brandMainLists');
    Route::get('/condition/lists', 'ConditionController@conditionLists');
    Route::get('/condition/add', 'ConditionController@conditionAdd');
    Route::post('/condition/add', 'ConditionController@postConditionAdd')->name('conditionadd');
    Route::get('/condition/edit/{id}', 'ConditionController@conditionEdit');
    Route::put('/condition/edit/{id}', 'ConditionController@postConditionEdit')->name('conditionedit');
    Route::get('condition/delete/{id}', 'ConditionController@delete');

});
