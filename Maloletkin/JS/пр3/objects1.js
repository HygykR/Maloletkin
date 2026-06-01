let daysOfWeek = {
  'понедельник': 'monday',
  'вторник': 'tuesday',
  'среда': 'wednesday',
  'четверг': 'thursday',
  'пятница': 'friday',
  'суббота': 'saturday',
  'воскресенье': 'sunday'
}

function translate(word, dictionary) {
  const englishWord = dictionary[word]
  return `${word} по-английски: ${englishWord}`
}
console.log(translate('суббота', daysOfWeek))