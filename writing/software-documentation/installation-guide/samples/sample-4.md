# A university course

## Prerequisites
- Node.js 20 or later
- Git and npm
- Access to the project repository

## Install
```bash
git clone https://example.com/acme/task-service.git
cd task-service
npm ci
cp .env.example .env
npm run dev
```

## Verify
Open `http://localhost:3000/health`. A successful response contains `{"status":"ok"}`. Set credentials locally; never commit secrets.

---
