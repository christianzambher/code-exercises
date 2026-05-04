# JS Pokemon Finder

Mini aplicación en JavaScript puro que consume la PokeAPI para buscar Pokémon por nombre.

## Features

- Búsqueda por nombre
- Consumo de API (fetch)
- Manejo de errores
- UI básica con estados (loading / error)

## Tecnologías

- JavaScript (ES6)
- HTML
- CSS

## Nuevas mejoras (v2)

- Cache con localStorage
- Historial de búsquedas
- Soporte tecla Enter
- Mejora en estados de UI

## Qué demuestra este proyecto

- Consumo de APIs REST
- Manejo de asincronía
- Manipulación del DOM


## Mejoras (v4)

- Optimización de cache mediante normalización de datos
- Prevención de error `QuotaExceededError` en localStorage
- Implementación de estrategia de almacenamiento eficiente
- Mejora en rendimiento al reducir tamaño de datos almacenados

## Decisiones técnicas

Para evitar problemas de almacenamiento, la aplicación no guarda la respuesta completa de la API.
En su lugar, se implementa una capa de transformación que extrae únicamente los datos necesarios:

- nombre
- imagen oficial
- imagen shiny
- tipos

Esto permite:
- reducir consumo de memoria
- mejorar rendimiento
- evitar errores de límite de almacenamiento

## Aprendizajes

- Manejo de asincronía con fetch y AbortController
- Implementación de cache con expiración (TTL)
- Optimización de datos para almacenamiento en cliente
- Manejo de estados en UI (loading, error, success)