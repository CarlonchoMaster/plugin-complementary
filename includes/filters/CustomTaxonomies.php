<?php
// Agregamos taxonomias personalizadas
feloopcustom()->register_taxonomy(
    'category_free_course',
    __('Categories', 'feloopcustom'),
    __('Category', 'feloopcustom'),
    array('free_course')
);
