
function search(arr, query) {
  let result = [];
  for (let i = 0; i < arr.length; i++) {
    if (arr[i].includes(query)) {
      result.push(arr[i]);
    }
  }
  return result;
}