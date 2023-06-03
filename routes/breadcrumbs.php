<?php


use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// داشبورد کاربران
Breadcrumbs::for('userPanel.index', function ($trail) {
    $trail->push('داشبورد کاربران', route('userPanel.index'));
});

// داشبورد کاربران > تیکت
Breadcrumbs::for('userPanel.tickets', function ($trail) {
    $trail->parent('userPanel.index');
    $trail->push('تیکت ها', route('userPanel.tickets.index'));
});
// داشبورد کاربران > تیکت
Breadcrumbs::for('userPanel.profile.index', function ($trail) {
    $trail->parent('userPanel.index');
    $trail->push('پروفایل', route('userPanel.profile.index'));
});

// داشبورد کاربران > تیکت > ایجاد
Breadcrumbs::for('userPanel.tickets.create', function ($trail) {
    $trail->parent('userPanel.tickets');
    $trail->push('ایجاد', route('userPanel.tickets.create'));
});

// داشبورد کاربران > تیکت > لیست
Breadcrumbs::for('userPanel.tickets.index', function ($trail) {
    $trail->parent('userPanel.tickets');
    $trail->push('لیست', route('userPanel.tickets.index'));
});

// داشبورد کاربران > تیکت > [تیکت]
Breadcrumbs::for('userPanel.tickets.show', function ($trail, $ticket) {
    $trail->parent('userPanel.tickets');
    $trail->push($ticket->getId(), route('userPanel.tickets.show', $ticket->getId()));
});


// داشبورد کاربران > مدیریت صفحه
Breadcrumbs::for('userPanel.pages.index', function ($trail) {
    $trail->parent('userPanel.index');
    $trail->push('مدیریت صفحه', route('userPanel.pages.index'));
});

// داشبورد کاربران > مدیریت صفحه > ایجاد صفحه
Breadcrumbs::for('userPanel.pages.create', function ($trail) {
    $trail->parent('userPanel.pages.index');
    $trail->push('ایجاد صفحه', route('userPanel.pages.create'));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه]
Breadcrumbs::for('userPanel.pages.show', function ($trail, $page) {
    $trail->parent('userPanel.pages.index');
    $trail->push($page->name, route('userPanel.pages.edit', $page));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > ویرایش صفحه
Breadcrumbs::for('userPanel.pages.edit', function ($trail, $page) {
    $trail->parent('userPanel.pages.show', $page);
    $trail->push('ویرایش صفحه', route('userPanel.pages.edit', $page));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > ساعت کاری
Breadcrumbs::for('userPanel.pages.workTime.create', function ($trail, $page) {
    $trail->parent('userPanel.pages.show', $page);
    $trail->push('ساعت کاری', route('userPanel.pages.workTime.index', $page));
});


// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت گالری
Breadcrumbs::for('userPanel.pages.galleries.index', function ($trail, $page) {
    $trail->parent('userPanel.pages.show', $page);
    $trail->push('مدیریت گالری', route('userPanel.pages.galleries.index', $page));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت گالری > گالری جدید
Breadcrumbs::for('userPanel.pages.galleries.create', function ($trail, $page) {
    $trail->parent('userPanel.pages.galleries.index', $page);
    $trail->push('گالری جدید', route('userPanel.pages.galleries.create', $page));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت گالری > [گالری]
Breadcrumbs::for('userPanel.pages.galleries.show', function ($trail, $page, $gallery) {
    $trail->parent('userPanel.pages.galleries.index', $page);
    $trail->push($gallery->name, route('userPanel.pages.galleries.show', [$page, $gallery]));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت گالری > [گالری] > ویرایش گالری
Breadcrumbs::for('userPanel.pages.galleries.edit', function ($trail, $page, $gallery) {
    $trail->parent('userPanel.pages.galleries.show', $page, $gallery);
    $trail->push('ویرایش گالری', route('userPanel.pages.galleries.edit', [$page, $gallery]));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت راه ارتباطی
Breadcrumbs::for('userPanel.pages.connections.create', function ($trail, $page) {
    $trail->parent('userPanel.pages.show', $page);
    $trail->push('مدیریت راه ارتباطی', route('userPanel.pages.connections.create', $page));
});

// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت راه ارتباطی
Breadcrumbs::for('userPanel.pages.messages.index', function ($trail, $page) {
    $trail->parent('userPanel.pages.show', $page);
    $trail->push('مدیریت پیام ها', route('userPanel.pages.messages.index', $page));
});
// داشبورد کاربران > مدیریت صفحه > [صفحه] > مدیریت راه ارتباطی
Breadcrumbs::for('userPanel.pages.messages.show', function ($trail, $page,$message) {
    $trail->parent('userPanel.pages.messages.index', $page);
    $trail->push('مدیریت پیام ها', route('userPanel.pages.messages.show',[$page,$message]));
});

// خانه
Breadcrumbs::for('front.index', function($trail){
    $trail->push('خانه', route('front.index'));
});

// خانه > صفحه ها
Breadcrumbs::for('front.pages.index', function($trail){
    $trail->parent('front.index');
    $trail->push('صفحه ها', route('front.pages.index'));
});

// خانه > صفحه ها > [صفحه]
Breadcrumbs::for('front.pages.show', function($trail, $page){
    $trail->parent('front.pages.index');
    $trail->push('صفحه ' . $page->getName(), route('front.pages.show', $page->getSlug()));
});

// خانه > صفحه ها > [صفحه] > [گالری]
Breadcrumbs::for('front.pages.galleries.show', function($trail, $page, $pageGallery){
    $trail->parent('front.pages.show', $page);
    $trail->push('گالری ' . $pageGallery->getName(), route('front.pages.galleries.show', [$page->getSlug(), $pageGallery->getSlug()]));
});


