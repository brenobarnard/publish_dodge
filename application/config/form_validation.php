<?php
defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
  'colors' => array(
    array(
      'field' => 'color',
      'label' => 'Color Name',
      'rules' => 'required|is_unique[colors.COLOR]|min_length[2]|max_length[40]|alpha',
      'errors'=> array ('is_unique' => 'This %s already exists.')
    )
  ),
  'categories' => array(
    array(
      'field' => 'category',
      'label' => 'Category',
      'rules' => 'required|is_unique[categories.CATEGORY]|min_length[2]|max_length[25]|alpha',
      'errors'=> array ('is_unique' => 'This %s already exists.')
    )
    ),
  'cars' => array(
    array(
      'field' => 'model',
      'label' => 'Model',
      'rules' => 'required|min_length[2]|max_length[200]'
    ),
    array(
      'field' => 'year',
      'label' => 'Year',
      'rules' => 'required|min_length[2]|max_length[200]|integer|greater_than[1769]',
      'errors'=> array ('greater_than' => 'This %s is invalid, the cars doesn\'t exists yet')
    ),
    array(
      'field' => 'color',
      'label' => 'Color',
      'rules' => 'required|integer|is_natural_no_zero',
      'errors'=> array ('required' => 'A %s must be set.')
    ),
    array(
      'field' => 'category',
      'label' => 'Category',
      'rules' => 'required|integer|is_natural_no_zero',
      'errors'=> array ('required' => 'A %s must be set.')
    ),
  )
);
