UPDATE wp_options
SET option_value = REPLACE(option_value,'https://sierrasinmobiliaria.com.ar','https://webmoderna.com.ar/sierrasinmobiliaria');

UPDATE wp_posts
SET post_content = REPLACE(post_content,'https://sierrasinmobiliaria.com.ar','https://webmoderna.com.ar/sierrasinmobiliaria');

UPDATE wp_posts
SET guid = REPLACE(guid,'https://sierrasinmobiliaria.com.ar','https://webmoderna.com.ar/sierrasinmobiliaria');

UPDATE wp_postmeta
SET meta_value = REPLACE(meta_value,'https://sierrasinmobiliaria.com.ar','https://webmoderna.com.ar/sierrasinmobiliaria');