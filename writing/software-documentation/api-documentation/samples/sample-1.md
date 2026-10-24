# A university mentoring programme

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
