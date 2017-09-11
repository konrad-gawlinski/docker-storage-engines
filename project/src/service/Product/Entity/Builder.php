<?php

namespace Nu3\Service\Product\Entity;

use Nu3\Service\Product\TransferObject;

class Builder
{
  function applyDtoAttributesToEntity(TransferObject $dto, Product $entity)
  {
    $entity->sku = $dto->getSku();
    $entity->type = $dto->getProductProperties()[Product::TYPE];

    $this->applyAttributes($dto, $entity);
  }

  private function applyAttributes(TransferObject $dto, Product $entity)
  {
    $properties = $dto->getProductProperties();
    $attributesMap = $this->getDto2DbPropertyMap();

    foreach ($properties as $property => $value) {
      if (isset($attributesMap[$property])) {
        $entity->properties[$attributesMap[$property]] = $value;
      }
    }
  }

  private function getDto2DbPropertyMap() : array
  {
    return [
      'bundle_only' => 'bundle_only',
      'use_portions' => 'use_portions',
      'feed_export_category' => 'feed_export_category',
      'canonical_version' => 'canonical_version',
      'seo_meta_robots_prod' => 'seo_meta_robots_prod',
      'canonical_url' => 'canonical_url',
      'cost' => 'cost',
      'related_products' => 'related_products',
      'alternative_product' => 'alternative_product',
      'cross_selling_products' => 'cross_selling_products',
      'base_gross_price' => 'base_gross_price',
      'tax_rate' => 'tax_rate',
      'final_gross_price' => 'final_gross_price',
      'recommended_retail_price' => 'recommended_retail_price',
      'max_price_reduction_of_rrp' => 'max_price_reduction_of_rrp',
      'pricing_particularity' => 'pricing_particularity',
      'best_before_price' => 'best_before_price',
      'CM1_margin_product' => 'CM1_margin_product',
      'best_before_sale' => 'best_before_sale',
      'reason_for_change' => 'reason_for_change',
      'performance_cluster' => 'performance_cluster',
      'status' => 'status',
      'status_particularity' => 'status_particularity',
      'particularity_reason' => 'particularity_reason',
      'brand_potential' => 'brand_potential',
      'name' => 'name',
      'local_name_add' => 'local_name_add',
      'partners_description' => 'partners_description',
      'description' => 'description',
      'short_description' => 'short_description',
      'product_specific_description' => 'product_specific_description',
      'extended_content_section_1' => 'extended_content_section_1',
      'extended_content_section_2' => 'extended_content_section_2',
      'extended_content_section_3' => 'extended_content_section_3',
      'extended_content_section_4' => 'extended_content_section_4',
      'extended_content_teaser_image' => 'extended_content_teaser_image',
      'sem_keywords' => 'sem_keywords',
      'meta_title' => 'meta_title',
      'meta_description' => 'meta_description',
      'url_key' => 'url_key',
      'nutrition_description' => 'nutrition_description',
      'medical_properties' => 'medical_properties',
      'purpose' => 'purpose',
      'user_guide' => 'user_guide',
      'allergen_warnings' => 'allergen_warnings',
      'side_effects' => 'side_effects',
      'contraindications' => 'contraindications',
      'special_nutrition_properties' => 'special_nutrition_properties',
      'special_precaution' => 'special_precaution',
      'storage_advice' => 'storage_advice',
      'waste_handling' => 'waste_handling',
      'key_product_benefit_1' => 'key_product_benefit_1',
      'key_product_benefit_2' => 'key_product_benefit_2',
      'key_product_benefit_3' => 'key_product_benefit_3',
      'PF_product_type' => 'PF_product_type',
      'PF_name' => 'PF_name',
      'manufacturer' => 'manufacturer',
      'weight' => 'weight',
      'weight_unit' => 'weight_unit',
      'own_brand_product' => 'own_brand_product',
      'base_category' => 'base_category',
      'product_group_l1' => 'product_group_l1',
      'product_group_l2' => 'product_group_l2',
      'product_group_l3' => 'product_group_l3',
      'prdnr' => 'prdnr',
      'amount' => 'amount',
      'variety' => 'variety',
      'portions' => 'portions',
      'portions_unit' => 'portions_unit',
      'unit' => 'unit',
      'drained_weight' => 'drained_weight',
      'package' => 'package',
      'glass_product' => 'glass_product',
      'cooled_product' => 'cooled_product',
      'package_gross_weight' => 'package_gross_weight',
      'package_height' => 'package_height',
      'package_length' => 'package_length',
      'package_width' => 'package_width',
      'ean' => 'ean',
      'pzn' => 'pzn',
      'label_language' => 'label_language',
      'manufacturer_data' => 'manufacturer_data',
      'country_of_origin_iso2' => 'country_of_origin_iso2',
      'customs_preferred_ch' => 'customs_preferred_ch',
      'customs_preferred_no' => 'customs_preferred_no',
      'customs_tariff_id_ch' => 'customs_tariff_id_ch',
      'customs_tariff_id_de' => 'customs_tariff_id_de',
      'customs_tariff_id_no' => 'customs_tariff_id_no',
      'multi_pack' => 'multi_pack',
      'ean_self' => 'ean_self',
      'main_label_language' => 'main_label_language',
      'bioreg' => 'bioreg',
      'package_net_weight' => 'package_net_weight',
      'gross_weight' => 'gross_weight',
      'net_quantity' => 'net_quantity',
      'net_unit' => 'net_unit',
      'packaging_material' => 'packaging_material',
      'config_skus_of_bundle' => 'config_skus_of_bundle',
      'bundle_type' => 'bundle_type',
      'category' => 'category',
      'dosage_form' => 'dosage_form',
      'short_dosage_form' => 'short_dosage_form',
      'target_group' => 'target_group',
      'best_before_date' => 'best_before_date',
      'flavour' => 'flavour',
      'scent' => 'scent',
      'multipack_portions' => 'multipack_portions',
      'application' => 'application',
      'mpn' => 'mpn',
      'Comment' => 'Comment',
      'manufacturer_multi' => 'manufacturer_multi',
      'icon_bio' => 'icon_bio',
      'icon_certified_natural' => 'icon_certified_natural',
      'icon_cologne_list' => 'icon_cologne_list',
      'icon_dye' => 'icon_dye',
      'icon_fairtrade' => 'icon_fairtrade',
      'icon_flavour' => 'icon_flavour',
      'icon_fructose_free' => 'icon_fructose_free',
      'icon_gelatine' => 'icon_gelatine',
      'icon_gluten' => 'icon_gluten',
      'icon_hypo' => 'icon_hypo',
      'icon_lactose' => 'icon_lactose',
      'icon_low_in_sugar' => 'icon_low_in_sugar',
      'icon_mineral_oil' => 'icon_mineral_oil',
      'icon_natural' => 'icon_natural',
      'icon_no_added_sugar' => 'icon_no_added_sugar',
      'icon_no_alcohol' => 'icon_no_alcohol',
      'icon_no_aluminum' => 'icon_no_aluminum',
      'icon_no_animal_experiments' => 'icon_no_animal_experiments',
      'icon_no_flavour_enhancers' => 'icon_no_flavour_enhancers',
      'icon_no_genetic_engineering' => 'icon_no_genetic_engineering',
      'icon_no_nanotechnology' => 'icon_no_nanotechnology',
      'icon_no_parabens' => 'icon_no_parabens',
      'icon_perfum' => 'icon_perfum',
      'icon_preservative' => 'icon_preservative',
      'icon_raw' => 'icon_raw',
      'icon_silicon' => 'icon_silicon',
      'icon_sugar' => 'icon_sugar',
      'icon_sugar_free' => 'icon_sugar_free',
      'icon_sulfat' => 'icon_sulfat',
      'icon_sweetner' => 'icon_sweetner',
      'icon_vegan' => 'icon_vegan',
      'icon_vegetarien' => 'icon_vegetarien',
      'icon_yeast' => 'icon_yeast',
      'icon_demeter' => 'icon_demeter',
      'icon_low_carb' => 'icon_low_carb',
      'expiration_placement' => 'expiration_placement',
      'expiration_type' => 'expiration_type',
      'minimum_best_before_date_days' => 'minimum_best_before_date_days',
      'best_before' => 'best_before',
      'best_before_unit' => 'best_before_unit',
      'product_type' => 'product_type',
      'ce_number' => 'ce_number',
      'daily_dosage' => 'daily_dosage',
      'daily_dosage_added_ingredient' => 'daily_dosage_added_ingredient',
      'daily_dosage_unit' => 'daily_dosage_unit',
      'is_beverage' => 'is_beverage',
      'is_gluten_free' => 'is_gluten_free',
      'is_single_source' => 'is_single_source',
      'is_sweetener' => 'is_sweetener',
      'dietary_treatment' => 'dietary_treatment',
      'caffeine' => 'caffeine',
      'age_group_max' => 'age_group_max',
      'age_group_max_unit' => 'age_group_max_unit',
      'age_group_min' => 'age_group_min',
      'age_group_min_unit' => 'age_group_min_unit',
      'medical_device_class' => 'medical_device_class',
      'only_rdd' => 'only_rdd',
      'special_treatment' => 'special_treatment',
      'warning_aspartam' => 'warning_aspartam',
      'warning_excessive_laxative' => 'warning_excessive_laxative',
      'warning_laxative' => 'warning_laxative',
      'warning_licorice' => 'warning_licorice',
      'warning_phenylalanin' => 'warning_phenylalanin',
      'warning_pressure_licorice' => 'warning_pressure_licorice',
      'warning_sugar' => 'warning_sugar',
      'warning_sweetener' => 'warning_sweetener',
      'sweetener' => 'sweetener',
      'nutrition_tool_data_available' => 'nutrition_tool_data_available',
      'stock_amount_in_stock' => 'stock_amount_in_stock',
      'stock_reserved_inventory' => 'stock_reserved_inventory',
      'stock_saleable_inventory' => 'stock_saleable_inventory',
      'stock_delivery_days' => 'stock_delivery_days',
      'stock_delivery_threshold' => 'stock_delivery_threshold',
      'stock_status' => 'stock_status',
      'stock_warning_amount' => 'stock_warning_amount',
      'availability' => 'availability',
      'out_of_stock' => 'out_of_stock',
      'available_again_at_supplier' => 'available_again_at_supplier',
      'reason_for_unavailability' => 'reason_for_unavailability',
      'back_in_stock_date' => 'back_in_stock_date',
      'current_supplier' => 'current_supplier',
      'date_of_last_notification' => 'date_of_last_notification',
      'global_cost' => 'global_cost',
      'stock_reach' => 'stock_reach',
      'first_order_date' => 'first_order_date',
      'inbound_date' => 'inbound_date',
      'storage_temperature' => 'storage_temperature',
      'best_before_date_sale' => 'best_before_date_sale',
      'best_before_sale_text' => 'best_before_sale_text',
      'global_name' => 'global_name',
      'brand' => 'brand',
      'sub_brand' => 'sub_brand',
      'product_line' => 'product_line',
      'PF_main_ingredient' => 'PF_main_ingredient',
      'product_family' => 'product_family',
      'unit_price_relation' => 'unit_price_relation',
    ];
  }
}
