<div class="nutrition-plan__total">
    <h3>Итого:</h3>
    <div class="grid grid-3">
        <div class="params-item">
            <div class="params-item__wrap">
                <div class="params-item__flex">
                    <div class="params-item__left">
                        <div class="icon">
                            <svg width="39" height="39" viewBox="0 0 39 39">
                                <use xlink:href="../assets/img/svg/icons.svg#chart"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="params-item__right">
                        <label>БЖУ</label>
                        <span><?php echo $data['protein'] . '/' . $data['fat'] . '/' . $data['carbohydrate'] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="params-item">
            <div class="params-item__wrap">
                <div class="params-item__flex">
                    <div class="params-item__left">
                        <div class="icon">
                            <svg width="33" height="42" viewBox="0 0 33 42">
                                <use xlink:href="../assets/img/svg/icons.svg#fire"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="params-item__right">
                        <label>Ккал</label>
                        <span><?php echo $this->format_num($data['energy']) ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="params-item">
            <div class="params-item__wrap">
                <div class="params-item__flex">
                    <div class="params-item__left">
                        <div class="icon">
                            <svg width="39" height="39" viewBox="0 0 39 39">
                                <use xlink:href="../assets/img/svg/icons.svg#glass"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="params-item__right">
                        <label>Вода</label>
                        <span><?php echo $this->format_num($data['water'] / 1000) ?> л</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>