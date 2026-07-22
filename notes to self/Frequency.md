# Frequency

## Frequency Types

### Day
#### Value
Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday
#### Num
| Value | Description |
|-------|-------------|
| +n | nth of the month |
| 0 | Standard |
| -n | n to last (or last) |

### Time
#### Value
0-24 (0 == 24)
#### Num
| Value | Description |
|-------|-------------|
| 0 | AM          |
| 1 | PM           |

### Period
#### Value
Minute, Hour, Day, Week, Month, Quarter, HalfAnnual, Annual
#### Num
"Every n..."

| Value | Description |
|-------|-----------|
| n | Interval  |

## Frequency Sets
### Every Monday, Tuesday, and Thursday at 2am (every week)

| Type   | Value    | Num |
|--------|----------|-----|
| Day    | Monday   | 0   |
| Day    | Tuesday  | 0   |
| Day    | Thursday | 0   |
| Time   | 2        | 0   |
| Period | Week     | 1   |

### Every 3 weeks

| Type   | Value    | Num |
|--------|----------|-----|
| Period | Week     | 3   |

### The first Monday of the month

| Type   | Value    | Num |
|--------|----------|-----|
| Day    | Monday   | 1   |


## Frequency Criteria

Not actually a part of Frequency, this belongs elsewhere.

- On Completion
- Every Cycle
- Every Cycle (Solo)
