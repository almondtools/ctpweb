@date(year,month,day) ::= [
    year = year,
    month = month,
    day = day
]

@time(hours,minutes,seconds, milliseconds=0) ::= [
    hours = hours,
    minutes = minutes,
    seconds = seconds,
    milliseconds = milliseconds
]

@datetime(year,month,day,hours,minutes,seconds,milliseconds) ::= [
    year = year,
    month = month,
    day = day,
    hours = hours,
    minutes = minutes,
    seconds = seconds,
    milliseconds = milliseconds
]