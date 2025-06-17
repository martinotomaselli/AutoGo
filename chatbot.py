from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
import subprocess

app = FastAPI()

# CORS per richieste da Laravel
app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://127.0.0.1:8000"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.post("/api/chat")
async def chat(request: Request):
    data = await request.json()
    message = data.get("message")

    try:
        # Chiamata a Ollama
        result = subprocess.run(
            ["ollama", "run", "llama3", message],
            capture_output=True,
            text=True,
            timeout=30
        )
        response_text = result.stdout.strip()
        return {"response": response_text}

    except Exception as e:
        return {"response": f"Errore durante la risposta: {str(e)}"}
