<?php if(isset($action) && isset($fields) && isset($id)): ?>
<form method="post" action="<?php echo $action; ?>" id="<?php echo $id; ?>">
    <fieldset>
        <input type="hidden" name="<?php echo \Config::get('security.csrf_token_key');?>" value="<?php echo \Security::fetch_token();?>" />
    </fieldset>
    <fieldset>
        <?php if(is_array($fields)): ?>
            <?php foreach($fields as $field): ?>
                    <?php if($field['type'] === 'textarea'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                            <textarea name="<?php echo $field['name']; ?>" 
                                id="<?php echo $field['id']; ?>"<?php if($field['required'] === true): ?> required <?php endif; ?>>
                                <?php if(isset($field['value'])): echo $field['value']; endif; ?>
                            </textarea>
                        </div>
                    <?php elseif($field['type'] === 'file'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                            <input type="file" name="<?php echo $field['name']; ?>" accept="<?php echo $field['accept']; ?>"
                            <?php if($field['required'] === true): ?> required <?php endif; ?>id="<?php echo $field['id']; ?>">
                        </div>
                    <?php elseif($field['type'] === 'color'): ?>
                        <div>
                            <input type="color" id="<?php echo $field['id']; ?>" name="<?php echo $field['name']; ?>" 
                            <?php if($field['required'] === true): ?> required <?php endif; ?>value="<?php echo $field['value']; ?>"> 
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                        </div>
                    <?php elseif($field['type'] === 'date'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                            <input type="date" id="<?php echo $field['id']; ?>" value="<?php echo $field['value']; ?>"
                                name="<?php echo $field['name']; ?>"<?php if($field['required'] === true): ?> required <?php endif; ?>
                                min="<?php echo $field['min']; ?>" max="<?php echo $field['max']; ?>">
                        </div>
                    <?php elseif($field['type'] === 'check'): ?>
                        <div>
                            <?php foreach($field['options'] as $i => $option): ?>
                                <div>
                                    <input type="checkbox" id="<?php echo $field['id']; ?>-<?php echo $i; ?>" value="<?php echo $option['value']; ?>"
                                    name="<?php echo $option['name']; ?>"<?php if($option['checked'] === true): ?> checked<?php endif; ?>
                                        <?php if($field['required'] === true): ?> required <?php endif; ?>>
                                    <label for="<?php echo $field['id']; ?>-<?php echo $i; ?>">
                                        <?php echo $option['label']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif($field['type'] === 'radio'): ?>
                        <div>
                            <?php foreach($field['options'] as $i => $option): ?>
                                <div>
                                    <input type="radio" id="<?php echo $field['id']; ?>-<?php echo $i; ?>" value="<?php echo $option['value']; ?>"
                                    name="<?php echo $option['name']; ?>"<?php if($option['checked'] === true): ?> checked<?php endif; ?>
                                        <?php if($field['required'] === true): ?> required <?php endif; ?>>
                                    <label for="<?php echo $field['id']; ?>-<?php echo $i; ?>">
                                        <?php echo $option['label']; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php elseif($field['type'] === 'combo'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>">
                                <?php echo $field['label']; ?>
                            <label>
                            <select name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>"
                                <?php if($field['required'] === true): ?> required <?php endif; ?>>
                                <?php foreach($field['options'] as $i => $option): ?>
                                    <option value="<?php echo $option['value']; ?>">
                                        <?php echo $option['label']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php elseif($field['type'] === 'combo-grouped'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>">
                                <?php echo $field['label']; ?>
                            <label>
                            <select name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>"
                                <?php if($field['required'] === true): ?> required <?php endif; ?>>
                                <?php foreach($field['options'] as $i => $group): ?>
                                    <optgroup label="<?php echo $group['label']; ?>">
                                        <?php foreach($field['members'] as $j => $option): ?>
                                            <option value="<?php echo $option['value']; ?>">
                                                <?php echo $option['label']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php elseif($field['type'] === 'number'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                            <input type="number" id="<?php echo $field['id']; ?>" name="<?php echo $field['name']; ?>"
                            min="<?php echo $field['min']; ?>" max="<?php echo $field['max']; ?>" 
                            <?php if($field['required'] === true): ?> required <?php endif; ?> value="<?php echo $field['value']; ?>">
                        </div>
                    <?php elseif($field['type'] === 'password'): ?>
                        <div>
                            <label for="<?php echo $field['id']; ?>"><?php echo $field['label']; ?></label>
                            <input type="password" id="<?php echo $field['id']; ?>" name="<?php echo $field['name']; ?>"
                                minlength="<?php echo $field['min']; ?>"<?php if($field['required'] === true): ?> required <?php endif; ?>
                                    placeholder="<?php echo $field['placeholder']; ?>" value="<?php echo $field['value']; ?>">
                        </div>
                    <?php elseif($field['type' === 'button']): ?>
                        <div>
                            <input type="button" 
                                value="<?php echo $field['value']; ?>"<?php if(!empty($field['click'])): ?> onmouseup="<?php echo $field['click']; ?>"  <?php endif; ?>>
                        </div>
                    <?php elseif($field['type' === 'submit']): ?>
                        <div>
                            <input type="submit" 
                                value="<?php echo $field['value']; ?>"<?php if(!empty($field['click'])): ?> onmouseup="<?php echo $field['click']; ?>"  <?php endif; ?>>
                        </div>
                    <?php else: ?>
                        <div>
                            <!--
                                type = email, hidden, tel, url
                            -->
                            <input type="<?php echo $field['type']; ?>"
                                name="<?php echo $field['name']; ?>" id="<?php echo $field['id']; ?>"
                                placeholder="<?php echo $field['placeholder']; ?>" value="<?php echo $field['value']; ?>"
                                <?php if($field['required'] === true): ?> required <?php endif; ?>>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </fieldset>
        <?php endif; ?>
    </form>
<?php endif; ?>