let getBrands = (e) => {
    selectDefOpt('#def-brand-opt');
    deleteDynOpt('.dyn-brand-opt');
    setModelsSelectToDefState();

    const goodsTypeId = e.target.value;

    sendAjax(
        `services/GettingBrands.php?goodsTypeId=${goodsTypeId}`,
        "GET"
    ).then((data) => {
        data.forEach((brand) => {
            let brandOpt = new Option(brand.name, brand.id);
            brandOpt.className = "dyn-brand-opt";
            brands.append(brandOpt);
        });
    });
}

let getModels = (e) => {
    setModelsSelectToDefState();

    const brandId = e.target.value;

    sendAjax(
        `services/GettingModels.php?brandId=${brandId}`,
        "GET"
    ).then((data) => {
        data.forEach((model) => {
            let modelOpt = new Option(model.name, model.id);
            modelOpt.className = "dyn-model-opt";
            models.append(modelOpt);
        });
    });
}

let setModelsSelectToDefState = () => {
    selectDefOpt('#def-model-opt');
    deleteDynOpt('.dyn-model-opt');
}

let selectDefOpt = (selectors) => {
    let defOpt = document.querySelector(selectors);

    if (!defOpt.selected) defOpt.selected = true;
}

let deleteDynOpt = (selectors) => {
    document.querySelectorAll(selectors).forEach((option) => {
        option.parentNode.removeChild(option);
    });
}

let sendAjax = async (url, method, data = null) => {
  let options = {
    method: method,
    headers: {
      'Content-Type': 'application/json'
    //   'Content-Type': 'application/x-www-form-urlencoded',
    }
  }

  if (data) options.body = JSON.stringify(data);

  const response = await fetch(url, options);

  return await response.json();
}
