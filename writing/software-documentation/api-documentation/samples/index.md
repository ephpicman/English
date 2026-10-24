# Api Documentation: Five Examples

Five original examples for **Api Documentation**, written for the genre and audience implied by the corresponding template. Names, dates, and metrics are illustrative; adapt them to the real brief.

---

## Example 1: A university mentoring programme

## Endpoint
`POST /v1/tasks` creates a task for the authenticated account.

### Request
```json
{
  "title": "Review onboarding flow",
  "due_date": "2026-11-15"
}
```

### Success response
```json
{
  "id": "tsk_1042",
  "status": "created"
}
```

Returns `201 Created` on success and `400 Bad Request` for invalid input. Include the bearer token in the `Authorization` header; do not retry non-retryable client errors.

---

## Example 2: A missed project deadline

## Endpoint
`POST /v1/tasks` creates a task for the authenticated account.

### Request
```json
{
  "title": "Review onboarding flow",
  "due_date": "2026-11-15"
}
```

### Success response
```json
{
  "id": "tsk_1042",
  "status": "created"
}
```

Returns `201 Created` on success and `400 Bad Request` for invalid input. Include the bearer token in the `Authorization` header; do not retry non-retryable client errors.

---

## Example 3: A new colleague

## Endpoint
`POST /v1/tasks` creates a task for the authenticated account.

### Request
```json
{
  "title": "Review onboarding flow",
  "due_date": "2026-11-15"
}
```

### Success response
```json
{
  "id": "tsk_1042",
  "status": "created"
}
```

Returns `201 Created` on success and `400 Bad Request` for invalid input. Include the bearer token in the `Authorization` header; do not retry non-retryable client errors.

---

## Example 4: A university course

## Endpoint
`POST /v1/tasks` creates a task for the authenticated account.

### Request
```json
{
  "title": "Review onboarding flow",
  "due_date": "2026-11-15"
}
```

### Success response
```json
{
  "id": "tsk_1042",
  "status": "created"
}
```

Returns `201 Created` on success and `400 Bad Request` for invalid input. Include the bearer token in the `Authorization` header; do not retry non-retryable client errors.

---

## Example 5: A workplace policy

## Endpoint
`POST /v1/tasks` creates a task for the authenticated account.

### Request
```json
{
  "title": "Review onboarding flow",
  "due_date": "2026-11-15"
}
```

### Success response
```json
{
  "id": "tsk_1042",
  "status": "created"
}
```

Returns `201 Created` on success and `400 Bad Request` for invalid input. Include the bearer token in the `Authorization` header; do not retry non-retryable client errors.

---

## Final review checklist

- The example matches the purpose and audience of the genre.
- Structure, register and requested outcome are clear.
- Replace illustrative names, dates and figures before real-world use.
- Compare the example with the sibling `template.md` and tailor it to the actual brief.