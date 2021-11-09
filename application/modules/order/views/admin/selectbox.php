<?php if(!empty($configProduct)):
$i = 0;
foreach($configProduct as $attributeCode => $optionIds):
$i++;
?>
    <?php if($i!=1): ?>
        <div class="form-group">
            <label><?php echo $app->getAttributeDataByCode($attributeCode,'label') ?></label>
            <select required <?php if($i==1):?>onchange="combinationCheck(this,<?php echo $productId ?>,<?php echo $attributeCode ?>)"<?php endif;?> id="<?php echo $attributeCode ?>" class="form-control" name="config[<?php echo $attributeCode ?>]">
                <?php foreach($app->getAttributesOption($optionIds) as $options){?>
                    <option value="<?php echo $options->value ?>"><?php echo $options->text ?></option>
                <?php } ?>
            </select>
        </div>
    <?php endif; ?>
<?php
endforeach;
endif; ?>