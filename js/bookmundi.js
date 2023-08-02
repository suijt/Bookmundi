var Bookmundi = (function () {
  function changeClass(element, newClassName) {
    element.className = newClassName;
  }

  function getDataset(element) {
    return element.dataset;
  }

  function injectElement(parentElement, newElement) {
    parentElement.appendChild(newElement);
  }

  function ajaxRequest(url, method, data, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        callback(xhr.responseText);
      }
    };
    xhr.send(JSON.stringify(data));
  }

  function getRequest(url, callback) {
    ajaxRequest(url, "GET", null, callback);
  }

  function postRequest(url, data, callback) {
    ajaxRequest(url, "POST", data, callback);
  }

  function getValue(element) {
    return element.value;
  }

  function setValue(element, value) {
    element.value = value;
  }

  function getCheckboxValue(checkbox) {
    return checkbox.checked;
  }

  function setCheckboxValue(checkbox, value) {
    checkbox.checked = value;
  }

  function getSelectValue(select) {
    return select.value;
  }

  function setSelectValue(select, value) {
    select.value = value;
  }
  return {
    changeClass: changeClass,
    getDataset: getDataset,
    injectElement: injectElement,
    getRequest: getRequest,
    postRequest: postRequest,
    getValue: getValue,
    setValue: setValue,
    getCheckboxValue: getCheckboxValue,
    setCheckboxValue: setCheckboxValue,
    getSelectValue: getSelectValue,
    setSelectValue: setSelectValue,
  };
})();
