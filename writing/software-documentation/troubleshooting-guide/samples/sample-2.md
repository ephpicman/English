# A missed project deadline

## Problem: The service will not start

**Symptoms:** The process exits or reports a connection error.

**Likely causes:** Missing environment variables, an unavailable database or an unsupported runtime version.

**Resolution:** Check the supported runtime, verify required keys in `.env`, and test database connectivity. Restart the service and inspect the first error in the logs.

**Escalation:** Share the version, timestamp and redacted error message. Never send passwords or access tokens.

---
