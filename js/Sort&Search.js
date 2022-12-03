function searchSort (arr, criteria) {
  let sortedArr = arr.sort(function(a, b) {
    if (criteria === 'time') {
      return a.time - b.time;
    } else if (criteria === 'alphabetical') {
      if (a.name.toLowerCase() < b.name.toLowerCase()) {
        return -1;
      } else if (a.name.toLowerCase() > b.name.toLowerCase()) {
        return 1;
      } else {
        return 0;
      }
    }
  });
  return sortedArr;
}

/* TEST */
let arr = [
  {name: 'John', time: 2},
  {name: 'Bob', time: 1},
  {name: 'Alex', time: 3}
];

console.log(searchSort(arr, 'time'));
console.log(searchSort(arr, 'alphabetical'));