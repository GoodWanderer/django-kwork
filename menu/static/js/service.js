export let getParam = async (param) => {
  let response = await fetch(`http://localhost:3000/${param}`);
  if (response.ok) {
    let res = await response.json();
    return res;
  } else {
    alert("Ошибка HTTP: " + response.status);
  }
}