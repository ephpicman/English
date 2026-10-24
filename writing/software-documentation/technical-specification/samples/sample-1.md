# A university mentoring programme

## Purpose
Provide reliable, secure support for a university mentoring programme.

## Functional requirements
- Validate required input and return actionable errors.
- Return a stable identifier for each created resource.
- Support retrieval and status tracking.

## Interface
`POST /v1/tasks` creates a resource; `GET /v1/tasks/{id}` retrieves it. All requests require bearer authentication.

## Reliability and security
Target 99.9% monthly availability. Apply rate limits, structured logs and least-privilege access. Do not log credentials or sensitive request bodies.

---
